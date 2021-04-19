<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Quantidade de material por grupo </title>

    <link href='https://css.gg/search.css' rel='stylesheet'>

</head>

<body>
    <div id="page-dadosmaterial" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="grid-12">
                <div class="titulo">
                    <h1> Quantidade de material por grupo </h1>
                </div>

                <?php include('../../../../server/src/dadosprecadastrados/listarMaterialGrupo.php');?>

            </div>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../main.js"></script>
</body>
</html>