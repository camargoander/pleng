<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Materiais da etapa </title>

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
                    <h1> Materiais da etapa </h1>
                </div>

                <form method="POST" name="filtrodiario" action="" class="filtro">
                    <div class="grid-12">
                        <h3> Filtrar </h3>
                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Etapa: </label>
                                    <select>
                                        <option> Nome... </option>
                                    </select>
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
                        <h3> Nome da etapa </h3>

                        <div class="field">
                            <label> Material: </label>
                            <select>
                                <option> Nome... </option>
                            </select>

                            <br/>
                            <select>
                                <option> Nome... </option>
                            </select>
                        </div>

                        <div class="grid-12">
                            <button type="submit" class="btnVerde"> Editar </button>
                            <button type="button" class="btnVermelho"> Deletar </button>
                        </div>
                    </form>
                </div>

                <div class="grid-4">
                    <form method="POST" name="editarmaterial" action="">
                        <h3> Nome da etapa </h3>

                        <div class="field">
                            <label> Material: </label>
                            <select>
                                <option> Nome... </option>
                            </select>

                            <br/>
                            <select>
                                <option> Nome... </option>
                            </select>
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