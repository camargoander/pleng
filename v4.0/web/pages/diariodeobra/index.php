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
                    <button> Cadastrar diário </button>
                </div>
                <div class="grid-6">
                    <input type="text" placeholder="Nome do diário" />
                    <input type="date" />
                    <button> <i class="gg-search"></i> </button>
                </div>
            </section>

            <section class="grid-12">

                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button" class="btnVerMais"> Ver mais </button>
                    <button type="button" class="btnImprimir" title="Imprimir relatório"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button" class="btnVerMais"> Ver mais </button>
                    <button type="button" class="btnImprimir" title="Imprimir relatório"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button" class="btnVerMais"> Ver mais </button>
                    <button type="button" class="btnImprimir" title="Imprimir relatório"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button" class="btnVerMais"> Ver mais </button>
                    <button type="button" class="btnImprimir" title="Imprimir relatório"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button" class="btnVerMais"> Ver mais </button>
                    <button type="button" class="btnImprimir" title="Imprimir relatório"> <i class="fa gg-file"></i> </button>
                </div>
            </section>

        </main>
    </body>
</html>