<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Cadastrar novo diário </title>

    <link href="../../../assets/styles/climaButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-cadastrardiariodeobra" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Cadastrar novo diário </h1>
            </div>

                <form method="POST" name="cadastrodiariodeobra" action="">
                    <div class="cont parte3">
                        
                        <div class="cabecalho">
                        </div>

                        <div class="infocab">
                            <div class="grid-3">
                                <img src="../../../assets/imgs/iconnum3.svg" />
                            </div>
                            <div class="grid-9">
                                <h3> Etapas </h3>
                                <p> 
                                    Selecione a etapa e altere as informações relacionadas a sua realização, 
                                    informando também a quantidade de material gastos para que seja calculado 
                                    a quantidade de material restante.
                                </p>
                            </div>
                        </div>
                        
                        <div class="field">
                            <label> Etapa: </label>
                            <select>
                                <option>Nome...</option>
                            </select>
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Quantidade de material usado: </label>
                                    <input type="text" name="qtdematusado" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <div class="field">
                                        <label> Quantidade de material pedido: </label>
                                        <input type="text" name="qtdematpedido" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Quantidade de material usado até agora: </label>
                                    <input type="text" name="qtdematatual" disabled />
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <div class="field">
                                        <label> Quantidade de material a ser usado até a finalização: </label>
                                        <input type="text" name="qtdemattotal" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items">
                            <div class="item">
                                <div class="field">
                                    <label> Tamanho concluido: </label>
                                    <input type="text" name="tamanho" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <div class="field">
                                        <label> Tamanho total: </label>
                                        <input type="text" name="tamanhototal" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid-12">
                            <button type="button" class="btnCancelar"> Cancelar </button>
                            <div class="botoes">
                                <button type="button" class="btnAvancar"> Finalizar </button>
                                <button type="button" class="btnAvancar"> Salvar </button>
                            </div>
                        </div>
                              
                    </div> <!--- fecha parte3 --->
                </form>
        </main>
    </div>

</body>
</html>

<!-- https://codepen.io/code4food/pen/rLvggd -->