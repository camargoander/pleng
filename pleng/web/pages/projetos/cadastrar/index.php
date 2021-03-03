<html>
    <head>
        <title> Home | Pleng </title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Julius+Sans+One&family=Source+Sans+Pro&display=swap" rel="stylesheet">

        <link href="../../../assets/styles/grid.css" rel="stylesheet" />
        <link href="./styles.css" rel="stylesheet" />
    </head>

    <body>
        <div id="page-cadastrarprojeto" class="container">
            <div class="grid-12">
                <div class="cabecalho">
                    <h2> PLENG </h2>
                </div>

                <main>
                    <div class="grid-12">
                        <div class="titulo">
                            <h1> Cadastre um novo projeto </h1>
                        </div>

                        <div class="grid-12">
                            <form method="POST" name="CadProjeto" action="../../../../server/src/projetos/CadastrarEditarProjeto.php">
                                <h3> Informe os dados do seu projeto </h3>
                                <div class="field">
                                    <label> Nome: </label>
                                    <input type="text" name="nome" value="<? echo $_SESSION['nome']; ?>" />
                                </div>

                                <div class="field">
                                    <label> Endereço: </label>
                                    <input type="text" name="endereco" value="<? echo $_SESSION['endereco']; ?>" />
                                </div>

                                <div class="field">
                                    <label> Cidade: </label>
                                    <input type="text" name="cidade" value="<? echo $_SESSION['cidade']; ?>" />
                                    <!-- <select name="cidade">
                                        <option> Nome... </option>
                                    </select> -->
                                </div>

                                <div class="field">
                                    <label> Empreiteiro: </label>
                                    <input type="text" name="empreiteiro" value="<? echo $_SESSION['empreiteiro']; ?>" />
                                    <!-- <select name="empreiteiro">
                                        <option> Nome... </option>
                                    </select> -->
                                </div>

                                <div class="field">
                                    <label> Descrição: </label>
                                    <textarea name="descricao" value="<? echo $_SESSION['descricao']; ?>"></textarea>
                                </div>

                                <div class="field grid-12">
                                    <div class="horizontal">
                                        <div class="grid-8">
                                            <label> Data de iniciação: </label>
                                            <div class="grid-12">
                                                <input type="date" class="grid-4" name="data_inicio" value="<? echo $_SESSION['data_inicio']; ?>" />
                                            </div>
                                        </div>
                                        <div class="grid-3 posicao">
                                            <label> Quantidade de dias: </label>
                                            <input type="text" class="grid-12" name="qtde_dias" value="<? echo $_SESSION['qtde_dias']; ?>" disabled /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-12">
                                    <button type="button" class="btnCancelar"> Cancelar </button>
                                    <button type="submit" class="btnAvancar"> Salvar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>