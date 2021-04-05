<html>
<head>
    
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Materiais </title>

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
                    <h1> Materiais </h1>
                </div>

                <form method="POST" name="filtrodiario" action="" class="filtro">
                    <div class="grid-12">
                        <h3> Filtrar </h3>
                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Material: </label>
                                    <input type="text" name="nomemat">
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="field">
                                    <label> Fornecedor: </label>
                                    <input type="text" name="nomefornec">
                                </div>
                            </div>
                            <div class="item">
                                <button type="submit" class="btnVerde"> <i class="gg-search"></i> </button>
                            </div>
                        </div>
                    </div>
                    
                </form>

                <div class="grid-4">
                    <form method="POST" name="editarmaterial" action="">
                        <h3> Nome do material </h3>

                        <div class="field">
                            <label> Nome: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Fornecedor: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Unidade: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Preço: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="grid-12">
                            <button type="submit" class="btnVerde"> Editar </button>
                            <button type="button" class="btnVermelho"> Deletar </button>
                        </div>
                    </form>
                </div>

                <div class="grid-4">
                    <form method="POST" name="editarmaterial" action="">
                        <h3> Nome do material </h3>

                        <div class="field">
                            <label> Nome: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Fornecedor: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Unidade: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="field">
                            <label> Preço: </label>
                            <input type="text" name="nome" />
                        </div>

                        <div class="grid-12">
                            <button type="submit" class="btnVerde"> Editar </button>
                            <button type="button" class="btnVermelho"> Deletar </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>