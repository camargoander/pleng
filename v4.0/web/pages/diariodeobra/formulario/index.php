<html>
    <head>
        
        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <link href="./climaButton.css" rel="stylesheet" />

        <title> PLENG | Configurar diário </title>
    </head>
    
    <body>

        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Configure o diário de obra </h1>


            <form>
                <div class="tabs">
  
                    <input type="radio" id="tab1" name="tab-control" checked>
                    <input type="radio" id="tab2" name="tab-control">
                    <input type="radio" id="tab3" name="tab-control">  

                    <ul>
                        <li title="Geral">
                            <label for="tab1" role="button">
                                <img src="" />
                                <span>Geral</span>
                            </label>
                        </li>
                        
                        <li title="Tempo e clima">
                            <label for="tab2" role="button">
                                <img src="" />
                                <span> Tempo e clima </span>
                            </label>
                        </li>  
                        <li title="Etapas">
                            <label for="tab3" role="button">
                                <img src="" />
                                <span> Etapas </span>
                            </label>
                        </li> 
                        
                    </ul>
                    
                    <div class="slider">
                        <div class="indicator"></div>
                    </div>

                    <div class="content">
                        <section>
                            <h2>Geral</h2>
                            <p> 
                                Cadastre as informações gerais do seu diário e mantenha-o sempre em dia, além de 
                                adicionar uma observação em seu diário de obra e detalhar as demais informações para 
                                que você tenha todos os dados registrados e possa emitir seus relatórios completos 
                                quando necessário.
                            </p>
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Data: </label>
                                        <input type="date" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Nome: </label>
                                        <input type="text" />
                                    </fieldset>
                                </div>
                            </div>
                            <fieldset>
                                <label> Observação: </label>
                                <textarea></textarea>
                            </fieldset>
                        </section>
                        <section>
                            <h2>Tempo e clima</h2>
                            <p> 
                                Informe o dia que foi efetuado o diário de obra e a condição climatica de cada dia da semana. 
                                Caso não saiba, deixe em branco.
                            </p>
                            
                            <div class="fieldtempo">
                                <label class="grid-3"> Segunda de manhã: </label>
                                
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
                        </section>

                        <section class="etapas">
                            <h2>Etapas</h2>

                            

                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Etapa: </label>
                                        <select>
                                            <option> Nome da etapa </option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Tamanho concluido: </label>
                                        <input type="text" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Tamanho total: </label>
                                        <input type="text" />
                                    </fieldset>
                                </div>
                                
                            </div>

                            <div class="items">
                                
                                <div class="item">
                                    <fieldset>
                                        <label> Material: </label>
                                        <select name="material">
                                            <option value="1"> Nome do material </option>
                                            <option value="2"> Nome do material 2 </option>
                                            <option value="3"> Nome do material 3 </option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Qtde. usada: </label>
                                        <input type="text" name="qtdeMatUsada" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <button type="button" onclick="onClickSalvarMaterial()"> Salvar material </button>
                                    </fieldset>
                                </div>
                            </div>

                            <h3> Materiais </h3>

                            <div class="lista grid-12">
                                <div class="itemlista">
                                    <label> <b> Nome do material </b></label>
                                    <label> <b> Qtde usada </b></label>
                                    <label> <b> Qtde total </b></label>

                                    <label> <b> X </b></label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div> 
                <button type="submit"> Salvar </button>      
                <button type="button" class="btnSecundario"> Cancelar </button>      
            </form>
        </main>
    </body>

    <script src="./main.js"></script>
</html>