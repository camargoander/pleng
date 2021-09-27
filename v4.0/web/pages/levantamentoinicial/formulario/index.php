<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <title> PLENG | Configurar levantamento inicial </title>
    </head>
    <body>
        
        <?php 
            include('../../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Configure a etapa do levantamento inicial </h1>

            <section class="infos grid-12">
                <section class="grid-5">
                    <form>
                        <fieldset>
                            <label> Etapa: </label>
                            <select>
                                <option> Etapa... </option>
                            </select>
                        </fieldset>

                        <div class="items">
                            <div class="item">
                                <fieldset>
                                    <label> Tamanho total: </label>
                                    <input type="text" name="tamanhoTotal" />
                                </fieldset>
                            </div>
                            <div class="item">
                                <fieldset>
                                    <label> Grupo: </label>
                                    <select>
                                        <option> Grupo... </option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div class="items">
                            <div class="item">
                                <fieldset>
                                    <label> Posição: </label>
                                    <input type="number" name="pos" />
                                </fieldset>
                            </div>
                            <div class="item">
                                <fieldset>
                                    <label> Situação: </label>
                                    <select>
                                        <option> Não iniciada </option>
                                        <option> Em andamento </option>
                                        <option> Finalizado </option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <fieldset>
                            <label> Descrição: </label>
                            <textarea></textarea>
                        </fieldset>
                        
                        <button type="submit"> Salvar </button>    
                    </form>
                </section>

                <section class="grid-5">
                    <h2> Mantenha seu projeto em dia </h2>

                    <p> 
                        Para que as informações do seu projeto estejam sempre 
                        atualizadas, informe os dados reais e mais precisos 
                        no cadastro das etapas que serão realizadas durante 
                        sua execução.
                    </p>

                    <h2> Dados pré-cadastrados </h2>

                    <p>
                        Caso não encontre a etapa ou o grupo desejado, você pode 
                        ir até a página de dados pré-cadastrados e cadastrar um 
                        novo registro, assim, deixando o sistema único para seu uso.
                    </p>

                    <h4> Dê seu feedback e colabore com as futuras versões do PLENG!</h4>
                </section>
            </section>

            <section class="grid-12">
                <h1> Diários de obra da etapa </h1>

                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button"> Ver mais </button>
                </div>
                <div class="diario grid-12">
                    <label> Nome do diário </label>
                    <input type="date" />

                    <button type="button"> Ver mais </button>
                </div>
            </section>
        </main>
    </body>
</html>