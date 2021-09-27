<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../../assets/styles/stylePopup.css" rel="stylesheet" />

        <title> PLENG | Empreiteiros </title>
    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Edite um empreiteiro ou cadastre um novo </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <button> Cadastrar empreiteiro </button>
                </div>
                <div class="grid-6">
                    <input type="text" placeholder="Nome do empreiteiro" />
                    <button> <i class="gg-search"></i> </button>
                </div>
            </section>

            <section class="grid-12">

                <div class="emp grid-12">
                    <label> Nome do empreiteiro </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="emp grid-12">
                    <label> Nome do empreiteiro </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="emp grid-12">
                    <label> Nome do empreiteiro </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="emp grid-12">
                    <label> Nome do empreiteiro </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                
            </section>

            <!-- popup de cadastrar -->
            <div id="cadastrarModal" class="modalDialog">
                <div>
                    <a href="#" title="Close" class="close">
                        <div class="close-container">
                            <div class="leftright"></div>
                            <div class="rightleft"></div>
                        </div>
                    </a>
                    <h2>Empreiteiros</h2>

                    <form method="POST" action="./index.php?action=cadastrar">
                        <fieldset>
                            <input type="text" name="nome" placeholder="Nome do empreiteiro" />
                        </fieldset>
                        
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

        </main>
    </body>
</html>