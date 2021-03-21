<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Editar diário </title>

    <link href="../../../assets/styles/climaButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-editardiariodeobra" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>
    
        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Editar diário </h1>
            </div>

            <form method="POST" name="editardiariodeobra" action="">
                <h3> Verifique as informações do diário de obra e altere caso necessário </h3>

                <div class="field">
                    <label> Data: </label>
                    <input type="date" name="data" />
                </div>

                <div class="field">
                    <label> Observacao: </label>
                    <textarea></textarea>
                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Segunda de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climasegundamanha" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundamanha" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundamanha" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundamanha" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Segunda de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climasegundatarde" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundatarde" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundatarde" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasegundatarde" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>

                <div class="fieldtempo">
                    <label class="grid-3"> Terça de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climatercamanha" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercamanha" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercamanha" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercamanha" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Terça de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climatercatarde" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercatarde" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercatarde" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climatercatarde" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>
                
                <div class="fieldtempo">
                    <label class="grid-3"> Quarta de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climaquartamanha" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartamanha" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartamanha" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartamanha" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Quarta de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climaquartarde" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartarde" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartarde" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquartarde" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>

                <div class="fieldtempo">
                    <label class="grid-3"> Quinta de manhã: </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintamanha" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Quinta de tarde: </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climaquintatarde" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <hr/>

                <div class="fieldtempo">
                    <label class="grid-3"> Sexta de manhã: </label>
                    
                    <label>
                        <input type="radio" name="climasextamanha" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextamanha" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextamanha" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextamanha" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>

                </div>

                <div class="fieldtempo">
                    <label class="grid-3"> Sexta de tarde: </label>
                    
                    <label>
                        <input type="radio" name="climasextatarde" value="nublado" checked />
                        <span>
                            <div class="icon">
                                <div class="cloud2 small-cloud"></div>
                                <div class="cloud2"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextatarde" value="chuva" />
                        <span>
                            <div class="icon">
                                <div class="cloud2"></div>
                                <div class="rain"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextatarde" value="sol" />
                        <span>
                            <div class="icon">
                                <div class="rays">
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                    <div class="ray"></div>
                                </div>
                                <div class="sun"></div>
                            </div>
                        </span>
                    </label>

                    <label>
                        <input type="radio" name="climasextatarde" value="vento" />
                        <span>
                            <div class="icon">
                                <div class="extreme text-center">
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                    <div class="harsh-wind"></div>
                                </div>
                            </div>
                        </span>
                    </label>
                </div>

                <hr/>

                <div class="grid-12">
                    <button type="button" class="btnBranco"> Cancelar </button>
                    <div class="botoes">
                        <button type="button" class="btnVerde" onClick="onClickAvancar();"> Salvar </button>
                    </div>
                </div>
            </form>

            <div class="titulo">
                <h1> Etapas </h1>
            </div>

            <form method="POST" name="etapadiariodeobra" action="" class="formEtapa">
                <div class="etapa">
                    <label>
                        <h2> Nome da etapa </h2>
                        <input type="checkbox" />
                        
                        <div class="collapse" id="col3Content">
    
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
                                <button type="button" class="btnBranco"> Cancelar </button>
                                <div class="botoes">
                                    <button type="button" class="btnVerde"> Salvar </button>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </form>
        </main>
    </div>
</body>
</html>