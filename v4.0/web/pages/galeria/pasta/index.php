<?php

    require('../../../../server/config/conexaosubpastas.php');
    require('../../../../server/config/redireciona.php');

    include('../../../../server/src/Pasta.php');

    if(!isset($_SESSION['usuario'])) {
        redireciona('../login/login.php');

        return;
    }
    if(!isset($_GET['id'])) {
        redireciona('../index.php');

        return;
    }

    $pastas = new Pasta($db);

    $info = (isset($_GET['id'])) ? $pastas->selecionarPasta($_GET['id']) : '';

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
                <button title= "Adicionar" class="btnAdicionar"> + </button>
                <a href="#deletarModal"><button title= "Excluir" class="btnExcluir"> x </button></a>
            </div>
        </nav>

        <main class="container">

            <section class="gallery" id="gallery">
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
                        <img src="https://source.unsplash.com/random/?tech,care" alt="">
                        <p> Para fazer parte do PLENG e aproveitar o que ele dispõe, você precisa entrar 
                            em contato com nossa equipe e aguardar nosso retorno com demais informações sobre 
                            seu acesso.
                        </p>
                    </div>

                    
                </div>
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
                        <img src="https://source.unsplash.com/random/?tech,studied" alt="">
                        <p> Para fazer parte do PLENG e aproveitar o que ele dispõe, você precisa entrar 
                            em contato com nossa equipe e aguardar nosso retorno com demais informações sobre 
                            seu acesso.
                        </p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="content"><img src="https://source.unsplash.com/random/?tech,substance" alt=""></div>
                </div>
                <div class="gallery-item">
                    <div class="content"><img src="https://source.unsplash.com/random/?tech,choose" alt=""></div>
                </div>
                <div class="gallery-item">
                    <div class="content"><img src="https://source.unsplash.com/random/?tech,past" alt=""></div>
                </div>
                <div class="gallery-item">
                    <div class="content"><img src="https://source.unsplash.com/random/?tech,lamp" alt=""></div>
                </div>
            </section>

            <?php require('./popups.php');?>

        </main>
    </body>

    <script src="./main.js"></script>
</html>