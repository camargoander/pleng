<html>
    <head>

        <?php 
            include('../../../assets/cmp/subpastas/head.php');
        ?>

        <link href="../../../assets/styles/formulario.css" rel="stylesheet" />

        <title> PLENG | Editar infromações do projeto </title>
    </head>

    <body>

        <?php 
            include('../../../assets/cmp/subpastas/cabecalho.php');
        ?>

        <?php 
            include('../../../assets/cmp/subpastas/menulateral.php');
        ?>

        <main class="container">
            <h1> Configurar projeto </h1>
            <section class="grid-9">
                <form class="layout">
                    <input name="nav" type="radio" class="nav home-radio" id="home" checked="checked" />
                    <div class="page home-page">
                        <div class="page-contents">
                            <h1>Nome e descrição</h1>

                            <fieldset>
                                <label> Nome: </label>
                                <input type="text" name="nome" />
                            </fieldset>
        
                            <fieldset>
                                <label> Descrição: </label>
                                <textarea name="descricao"></textarea>
                            </fieldset>

                        </div>
                    </div>
                    <label class="nav" for="home">
                        <span> Nome e descrição </span>
                    </label>

                    <input name="nav" type="radio" class="about-radio" id="about" />
                    <div class="page about-page">
                        <div class="page-contents">
                            <h1>Localização</h1>

                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Estado: </label>  
                                        <select name="state" id="state" onchange="selectedState(this)">
                                            <option></option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Cidade: </label>  
                                        <select name="city" id="city">
                                            <option>Selecionar cidade</option>
                                        </select> 
                                    </fieldset>
                                </div>
                            </div>
        
                            <fieldset>
                                <label> Endereço: </label>
                                <input type="text" name="endereco" />
                            </fieldset>
                        </div>
                    </div>
                    <label class="nav" for="about">
                        <span> Localização </span>
                    </label>

                    <input name="nav" type="radio" class="contact-radio" id="contact" />
                    <div class="page contact-page">
                        <div class="page-contents">
                            <h1>Empreiteiro e datas</h1>
                            <fieldset>
                                <label> Empreiteiro: </label>
                                <select name="empreiteiro">
                                </select>
                            </fieldset>
        
                            <div class="items">
                                <div class="item">
                                    <fieldset>
                                        <label> Data de início: </label>
                                    <input type="date" id="dataIni" class="grid-10" name="data_inicio" onchange="calculaDias();" />
                                    </fieldset>
                                </div>
                                <div class="item">
                                    <fieldset>
                                        <label> Quantidade de dias: </label>
                                    <input type="text" id="qtdeDias" class="grid-12" name="qtde_dias" readonly />
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="nav" for="contact">
                        <span> Empreiteiro e datas </span>
                    </label>

                    <div class="buttons">
                        <button type="submit"> Salvar </button>
                        <a href="../../menu/index.html"><button type="button" class="btnSecundario"> Cancelar </button></a>
                    </div>
                </form>
            </section>
        </main>
    </body>
</html>