<!-- https://codepen.io/Podgro/pen/eWWYrL -->
<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/LevantamentoInicial.php');
    include('../../../server/src/Orcamento.php');
    include('../../../server/src/MaterialEtapa.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $levantamentos = new LevantamentoInicial($db);

    $etapas = $levantamentos->listarLevantamento($_SESSION['projeto']);

    $orcamentos = new Orcamento($db);

    $materialEtapa = new MaterialEtapa($db);

    
    $listaMaterialEtapa = (isset($_GET['id'])) ? $materialEtapa->selecionarMateriaisEtapa($_GET['id']) : '';
    
    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    switch($action) {
        
        case 'cadastrar': {
            $orcamentoDados = (object) array (
                "idlevantamento" => $_POST['idlevantamento'],
                "idmaterial" => $_POST['material'],
                "qtde_comprada" => $_POST['qtde_comprada'],
                "qtde_faltante" => $_POST['qtde_faltante'],
                "fornecedor" => $_POST['fornecedor'],
                "data_compra" => $_POST['data_compra'],
                "valor_compra" => $_POST['valor_compra']
            );

            $orcamentos->cadastrarOrcamento($orcamentoDados);

            redireciona('./index.php');
            break;
        }
    }
?>


<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">
        <link href="../../assets/styles/stylePopup.css" rel="stylesheet" />
        <link href="../../assets/styles/formulario.css" rel="stylesheet" />

        <title> PLENG | Orçamento do projeto </title>
    </head>

    <body>

        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Orçamento </h1>

            <section class="pesquisa grid-12">
                <form class="grid-6" method="POST" action="./index.php?action=filtrar">
                    <input type="text" name="filtro" placeholder="Nome da etapa" />
                    <button type="submit"> <i class="gg-search"></i> </button>
                </form>
            </section>
            
            <section class="grid-12">
            
                <?php while($etp = $etapas->fetchArray()) : ?>
                    <div  class="item grid-12" onclick="onMostrarMateriais(<?= $etp['idlevantamento']?>)">
                    <div class="orc">
                        <label> <?= $etp['nome']?> </label>
    
                        <div>
                            <a href="?nomerel=OrcamentoDetalhado#logoModal">
                                <button type="button" title="Imprimir orçamento"> 
                                    <i class="gg-file"></i> 
                                </button>
                            </a>
                            <a href="?id=<?= $etp['idlevantamento']; ?>#cadastrarModal">
                                <button  type="button" title="Adicionar novo material">
                                    <i class="gg-add-r"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    
                    <div id="collapse<?= $etp['idlevantamento'] ?>" class="collapse">
                        <div class="mat">
                            <label> <b> nome material </b> </label>

                            <div class="meio">
                                <label> <b> comp. </b> </label>
                                <label> <b> falt. </b> </label>
                                <label> <b> data compra </b> </label>
                                <label> <b> valor </b> </label>
                            </div>

                            <div>
                            </div>

                            <?php 
                                $materiais = $orcamentos->listarOrcamento($etp['idlevantamento']);

                                while($mat = $materiais->fetchArray()):
                            ?>
                                <label> <?= $mat['nome']; ?> </label>

                                <div class="meio">
                                    <label> <?= $mat['qtde_comprada']; ?> </label>
                                    <label> <?= $mat['qtde_faltante']; ?> </label>
                                    <label> <?= $mat['data_compra']; ?> </label>
                                    <label> R$ <?= number_format($mat['valor_compra'], 2) ?> </label>
                                </div>

                                <div>
                                    <button> e </button>
                                    <button> x </button>
                                </div>
                            <?php endwhile; ?>
                        </div>


                    </div>
                </div>
                <?php endwhile; ?>
            </section>

            <!-- popup de cadastrar -->
            <?php if(isset($_GET['id'])): ?>
            <div id="cadastrarModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2> Material </h2>

                    <form method="POST" action="./index.php?action=cadastrar">
                        <input type="hidden" value="<?= $_GET['id']; ?>" name="idlevantamento" />
                        <fieldset>
                            <select name="material">
                                <?php while($matetp = $listaMaterialEtapa->fetchArray()): ?>

                                <option value="<?= $matetp['idmat']; ?>"> <?= $matetp['nome']; ?></option>

                                <?php endwhile; ?>
                            </select>
                        </fieldset>

                        <fieldset>
                            <input type="text" name="fornecedor" placeholder="Fornecedor" />
                        </fieldset>

                        <div class="items">
                            <div class="item">
                                <fieldset>
                                    <input type="text" name="qtde_comprada" placeholder="Quantidade comprada" />
                                </fieldset>
                            </div>
                            
                            <div class="item">
                                <fieldset>
                                    <input type="text" name="qtde_faltante" placeholder="Quantidade faltante" />
                                </fieldset>
                            </div>
                        </div>

                        <div class="items">
                            <div class="item">
                                <fieldset>
                                    <input type="text" name="valor_compra" placeholder="Valor total" />
                                </fieldset>
                            </div>
                            
                            <div class="item">
                                <fieldset>
                                    <input type="date" name="data_compra" />
                                </fieldset>
                            </div>
                        </div>
                        
                        <div class="items">
                            <div class="item">
                                <a href="#"><button type="button" class="btnSecundario"> Cancelar </button></a>
                            </div>
                            <div class="item">
                                <button type="submit" class="btnPrincipal"> Cadastrar </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </main>
    </body>

    <script src="./main.js"></script>
</html>