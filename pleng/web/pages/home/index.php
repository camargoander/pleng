<html>
    <head>
        <title> Home | Pleng </title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Julius+Sans+One&family=Source+Sans+Pro&display=swap" rel="stylesheet">

        <link href="../../assets/styles/grid.css" rel="stylesheet" />
        <link href="./styles.css" rel="stylesheet" />
    </head>
    <body>
        <div id="page-home" class="container">
            <div class="grid-12">
                <div class="cabecalho">
                    <h2> PLENG </h2>
                </div>

                <main>
                    <div class="grid-12">
                        <div class="titulo">
                            <h1> Selecione seu projeto </h1>
                        </div>

                        <?php
                            include('../../../server/src/projetos/ListaProjetos.php');
                        ?>
                    
                    </div>

                    <div>
                        <a href="../../../server/src/projetos/SetaCadastroProjeto.php">
                            <button type="button" class="adicionar"> + </button>
                        </a>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>