<!-- https://codepen.io/Podgro/pen/eWWYrL -->
<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/LevantamentoInicial.php');
    include('../../../server/src/Orcamento.php');

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
?>


<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">

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
    
                        <a href="?nomerel=OrcamentoDetalhado#logoModal">
                            <button type="button" class="btnImprimir" title="Imprimir orçamento"> 
                                <i class="fa gg-file"></i> 
                            </button>
                        </a>
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
        </main>
    </body>

    <script src="./main.js"></script>
</html>