<?php

    require('../../../server/config/conexao.php');
    require('../../../server/config/redireciona.php');

    include('../../../server/src/DiarioDeObra.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }

    if(!isset($_SESSION['projeto'])) {
        redireciona('../projetos/index.php');

        return;
    }

    $diarios = new DiarioDeObra($db);

    $itemDiario = $diarios->listarDiario($_SESSION['projeto']);

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    if($action == 'filtrar') {

        $itemDiario = $diarios->listarDiarioFiltrado($_SESSION['projeto'], $_POST['nomeDiario'], $_POST['dataDiario']);

        $action = '';
    }

?>

<html>
    <head>
        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <title> PLENG | Diário de obra </title>
    </head>

    <body>
        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Selecione um diário de obra ou inicie um novo </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <a href="./formulario/index.php"><button> Cadastrar diário </button></a>
                </div>
                <div class="grid-6">
                    <form method="POST" action="./index.php?action=filtrar">
                        <input type="text" placeholder="Nome do diário" name="nomeDiario" />
                        <input type="date" name="dataDiario" />
                        <button> <i class="gg-search"></i> </button>
                    </form>
                </div>
            </section>

            <section class="grid-12">

                <?php while($diario = $itemDiario->fetchArray()) : ?>
                <div class="diario grid-12">
                    <label> <?= $diario['nome']; ?> </label>
                    <input type="date" value="<?= $diario['datadiario']; ?>" />

                    <button type="button" class="btnVerMais"> Ver mais </button>
                    <button type="button" class="btnImprimir" title="Imprimir relatório"> <i class="fa gg-file"></i> </button>
                </div>
                <?php endwhile; ?>
            </section>

        </main>
    </body>
</html>