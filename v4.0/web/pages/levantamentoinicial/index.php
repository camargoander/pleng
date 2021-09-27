<html>
    <head>

        <?php 
            include('../../assets/cmp/principal/head.php');
        ?>

        <link href='https://css.gg/check-r.css' rel='stylesheet'>
        <link href='https://css.gg/sand-clock.css' rel='stylesheet'>
        <link href='https://css.gg/user-list.css' rel='stylesheet'>

        <title> PLENG | Levantamento inicial </title>
    </head>

    <body>
        
         <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <section class="grid-8">
                <h1> Levantamento inicial do projeto </h1>
                <p>
                    Aqui você pode verificar e editar todas as etapas cadastradas 
                    no levantamento inicial do projeto. Você pode altera-lo a qualquer 
                    momento e registrar uma nova etapa durante seu desenvolvimento 
                    caso seja necessário.
                </p>
            </section>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <button> Nova etapa </button>
                </div>
                <div class="grid-6">
                    <select>
                        <option> Etapa </option>
                    </select>
                    <button> <i class="gg-search"></i> </button>
                </div>
            </section>

            <section class="grid-12">
                <h3> Etapas em andamento </h3>
                <div class="etapas">
                    <div class="grid-3"> <i class="fa gg-user-list"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-user-list"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-user-list"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-user-list"></i> <span> Nome etapa </span> </div>
                </div>
                <h3> Etapas não iniciadas </h3>
                <div class="etapas">
                    <div class="grid-3"> <i class="fa gg-sand-clock"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-sand-clock"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-sand-clock"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-sand-clock"></i> <span> Nome etapa </span> </div>
                </div>
                <h3> Etapas finalizadas </h3>
                <div class="etapas">
                    <div class="grid-3"> <i class="fa gg-check-r"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-check-r"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-check-r"></i> <span> Nome etapa </span> </div>
                    <div class="grid-3"> <i class="fa gg-check-r"></i> <span> Nome etapa </span> </div>
                </div>
            </section>
        </main>
    </body>
</html>