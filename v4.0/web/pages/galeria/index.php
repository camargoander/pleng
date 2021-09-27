<!-- https://codepen.io/Podgro/pen/eWWYrL -->

<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">

        <title> PLENG | Galeria do projeto </title>
    </head>

    <body>

        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Galeria </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <button> Nova pasta </button>
                </div>
                <div class="grid-6">
                    <input type="text" placeholder="Nome da pasta" />
                    <button> <i class="gg-search"></i> </button>
                </div>
            </section>

            <section class="grid-12">
                <section class="grid-8">
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 1</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 2</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                    <div class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Folder 3</p></div>
                </section>
                <section class="lista grid-4">
                    <div class="item"><h3> últimos arquivos adicionados </h3></div>
                    <div class="item"><i class="fa fa-file-o" aria-hidden="true"></i><p>test-file-1.pdf</p></div>
                    <div class="item"><i class="fa fa-file-o" aria-hidden="true"></i><p>test-file-2.pdf</p></div>
                    <div class="item"><i class="fa fa-file-o" aria-hidden="true"></i><p>test-file-3.pdf</p></div>
                    <div class="item"><i class="fa fa-file-o" aria-hidden="true"></i><p>test-file-4.pdf</p></div>
                    <div class="item"><i class="fa fa-file-o" aria-hidden="true"></i><p>test-file-5.pdf</p></div>
                </section>
            </section>
            
        </main>
    </body>
</html>