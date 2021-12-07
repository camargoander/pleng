<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Pasta.php');
    include('../../../../server/src/Galeria.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }
    if(!isset($_GET['id'])) {
        redireciona('../index.php');

        return;
    }

    $pastas = new Pasta($db);
    $galeria = new Galeria($db);

    $info = (isset($_GET['id'])) ? $pastas->selecionarPasta($_GET['id']) : '';

    $fotos = $galeria->listarFotos($_GET['id']);

    $action = (isset($_REQUEST['action'] )) ? $_REQUEST['action']  : '';

    switch($action) {
        
        case 'deletar': {
            $pastas->deletarPasta($_POST['id']);

            redireciona('../index.php');
            break;
        }

        case 'editar': {
            $pastas->editarPasta($_POST['nome'], $_POST['id']);
            redireciona('./index.php?id=' . $_POST['id']);

            break;
        }

        case 'cadastrar': {
            $fotosDados = (object) array(
                "nome" => $_POST['nome'],
                "descricao" => $_POST['descricao'],
                "data_foto" => $_POST['data_foto'],
                "foto" => $_FILES['foto'],
                "pasta" => $_POST['id']
            );

            $galeria->cadastrarFoto($fotosDados);

            redireciona('./index.php?id=' . $_POST['id']);

            break;
        }
    }

?>

<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../../assets/styles/stylePopup.css" rel="stylesheet" />

        <link href='https://css.gg/arrow-left.css' rel='stylesheet'>

        <title> PLENG | Pasta de fotos </title>
    </head>
    <body>
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <nav>
            <a class="seta" href="../index.php"> <i class="gg-arrow-left"></i> </a>
            <h1> <?= $info['nome']; ?></h1>
            <div>
                <a href="#editarModal"><button title= "Editar" class="btnEditar"> e </button></a>
                <a href="#cadastrarModal"><button title= "Adicionar" class="btnAdicionar"> + </button></a>
                <a href="#deletarModal"><button title= "Excluir" class="btnExcluir"> x </button></a>
            </div>
        </nav>

        <main class="container">

            <section class="gallery" id="gallery">
                <?php while($foto = $fotos->fetchArray()) :?>
                    <div class="gallery-item">
                        <div class="wrapper">
                            <a href="#" class="close-button">
                            <div class="in">
                                <div class="close-button-block"></div>
                                <div class="close-button-block"></div>
                            </div>
                            <div class="out">
                                <div class="close-button-block"></div>
                                <div class="close-button-block"></div>
                            </div>
                            </a>
                        </div>
                        <div class="content">
                            <img src="./imgproj/<?= $foto['foto']; ?>" alt="<?= $foto['nome']; ?>">
                        </div>   
                    </div>
                <?php endwhile; ?>
                
            </section>

            <?php require('./popups.php');?>

        </main>
    </body>

    <script src="./main.js"></script>
</html>