<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../../assets/styles/stylePopup.css" rel="stylesheet" />

        <title> PLENG | Etapas </title>
    </head>

    <body>
        
        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>
        
        <main class="container">
            <h1> Edite uma etapa ou cadastre uma nova </h1>

            <section class="pesquisa grid-12">
                <div class="grid-3">
                    <button> Cadastrar etapa </button>
                </div>
                <div class="grid-6">
                    <input type="text" placeholder="Nome da etapa" />
                    <button> <i class="gg-search"></i> </button>
                </div>
            </section>

            <section class="grid-12">

                <div class="etapa grid-12">
                    <label> Nome da etapa </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="etapa grid-12">
                    <label> Nome da etapa </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="etapa grid-12">
                    <label> Nome da etapa </label>
                    <input type="number" value="123" readonly />

                    <button type="button" class="btnEditar"> Editar </button>
                    <button type="button" class="btnExcluir" title="Excluir"> <i class="fa gg-file"></i> </button>
                </div>
                <div class="etapa grid-12">
                    <label> Nome da etapa </label>
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
                    <h2> Etapas </h2>

                    <form method="POST" action="./index.php?action=cadastrar">
                        <fieldset>
                            <input type="text" name="nome" placeholder="Nome da etapa" />
                        </fieldset>

                        <div class="items">
                            <div class="item">
                                <fieldset>
                                    <select name="material">
                                        <option> Nome do material </option>
                                        <option value="1"> teste 1</option>
                                        <option value="2"> teste 2</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="item">
                                <fieldset>
                                    <input type="text" name="qtde" placeholder="Quantidade" />
                                </fieldset>
                            </div>

                            <div class="item btnMaterial">
                                <button type="button" onclick="onClickSalvarMaterial()" class="btnPrincipal"> s </button>
                            </div>
                        </div>
                        
                        <div class="lista">

                        </div>
                        
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

    <script src="./main.js"></script>

</html>