<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/DiarioDeObra.php');
    include('../../../../server/src/LevantamentoInicial.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../../projetos/index.php');

        return;
    }

    $diarios = new DiarioDeObra($db);
    $etapas = new LevantamentoInicial($db);

    $etapa = $etapas->listarLevantamento($_SESSION['projeto']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $diarioDados = (object) array (
            'datadiario' => $_POST['datadiario'],
            'nome' => $_POST['nome'],
            'observacao' => $_POST['observacao'],
            'idprojeto' => $_SESSION['projeto']
        );

        $previsaoTempo = (object) array (
            'temsegmanha' => $_POST['temsegmanha'],
            'temsegtarde' => $_POST['temsegtarde'],
            'temtermanha' => $_POST['temtermanha'],
            'temtertarde' => $_POST['temtertarde'],
            'temquamanha' => $_POST['temquamanha'],
            'temquatarde' => $_POST['temquatarde'],
            'temquimanha' => $_POST['temquimanha'],
            'temquitarde' => $_POST['temquitarde'],
            'temsexmanha' => $_POST['temsexmanha'],
            'temsextarde' => $_POST['temsextarde'],
            'idprojeto' => $_SESSION['projeto']
        );

        $etapaDados = (object) array(
            'idprojeto' => $_SESSION['projeto'],
            'idlevantamento' => $_POST['levantamento'],
            'qtde' => $_POST['qtde']
        );

        $materiaisEtapa = explode("\\", $_POST['matValue']);

        // var_dump($diarioDados);
        $diarios->cadastrarDiarioDeObra($diarioDados, $previsaoTempo, $etapaDados, $materiaisEtapa);
        
        redireciona('../index.php');
    }
?>

<html>
    <head>
        
        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <link href="./climaButton.css" rel="stylesheet" />

        <title> PLENG | Configurar diário </title>
    </head>
    
    <body>

        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Configure o diário de obra </h1>


            <form method="POST" action="./index.php">
                <div class="tabs">
  
                    <input type="radio" id="tab1" name="tab-control" checked>
                    <input type="radio" id="tab2" name="tab-control">
                    <input type="radio" id="tab3" name="tab-control">  

                    <ul>
                        <li title="Geral">
                            <label for="tab1" role="button">
                                <img src="" />
                                <span>Geral</span>
                            </label>
                        </li>
                        
                        <li title="Tempo e clima">
                            <label for="tab2" role="button">
                                <img src="" />
                                <span> Tempo e clima </span>
                            </label>
                        </li>  
                        <li title="Etapas">
                            <label for="tab3" role="button">
                                <img src="" />
                                <span> Etapas </span>
                            </label>
                        </li> 
                        
                    </ul>
                    
                    <div class="slider">
                        <div class="indicator"></div>
                    </div>

                    <div class="content">
                        <section>
                            <h2>Geral</h2>
                            <p> 
                                Cadastre as informações gerais do seu diário e mantenha-o sempre em dia, além de 
                                adicionar uma observação em seu diário de obra e detalhar as demais informações para 
                                que você tenha todos os dados registrados e possa emitir seus relatórios completos 
                                quando necessário.
                            </p>
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Data: </label>
                                        <input type="date" name="datadiario" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Nome: </label>
                                        <input type="text" name="nome" />
                                    </fieldset>
                                </div>
                            </div>
                            <fieldset>
                                <label> Observação: </label>
                                <textarea name="observacao"></textarea>
                            </fieldset>
                        </section>
                        
                        <?php require('./previsaoTempo.php');?>

                        <section class="etapas">
                            <h2>Etapas</h2>

                            

                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Etapa: </label>
                                        <input list="etapa" name="obs" id="obs" />
                                        <input type="hidden" name="levantamento" id="levantamento" />

                                        <datalist id="etapa">
                                            <?php while($etp = $etapa->fetchArray()) : ?>

                                            <option value="<?= $etp['idlevantamento'];?> - <?= $etp['nome'];?>"> 
                                                <?= $etp['nome']; ?> - 
                                                <span id="<?= $etp['idlevantamento']; ?>">
                                                    <?= $etp['tamanho_total'];?> m
                                                </span>
                                            </option>

                                            <?php endwhile; ?>
                                        </datalist>
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Tamanho concluido: </label>
                                        <input type="text" name="qtde" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Tamanho total: </label>
                                        <input type="text" readonly id="tamTotal" />
                                    </fieldset>
                                </div>
                                
                            </div>

                            <div class="items">
                                <input type="hidden" name="matValue" id="matValue" multiple/>
                                
                                <div class="item">
                                    <fieldset>
                                        <label> Material: </label>
                                        <select name="material" class="material">
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Qtde. usada: </label>
                                        <input type="text" name="qtdeMatUsada" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <button type="button" onclick="onClickSalvarMaterial()"> Salvar material </button>
                                    </fieldset>
                                </div>
                            </div>

                            <h3> Materiais </h3>

                            <div class="lista grid-12">
                                <div class="itemlista">
                                    <label> <b> Nome do material </b></label>
                                    <label> <b> Qtde usada </b></label>

                                    <label> <b> X </b></label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div> 
                <button type="submit"> Salvar </button>      
                <button type="button" class="btnSecundario"> Cancelar </button>      
            </form>
        </main>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./main.js"></script>
</html>