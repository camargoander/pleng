<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Materiais </title>

    <link href="../../../assets/styles/radioButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-materialetapa" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>

        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>
        
        <main>
            <div class="titulo">
                <h1> Quantidade de material por etapa </h1>
            </div>
            <div class="grid-10">
                <p> 
                    Antes de finalizar, verifique aqui a quantidade de material utilizada em cada etapa. No 
                    final da página é possivel encontrar uma lista geral da quantidade total de cada material. 
                    Você também pode alterar os materiais e suas medições na aba "Dados pré-cadastrados", adaptando 
                    da melhor forma ao seus projetos. Essa lista estará disponivel em "Dashboard" posteriormente.
                </p>
            </div>

            <div class="grid-10 etapa">
                <label>
                    <h2> Nome da etapa </h2>
                    <input type="checkbox" />
                    <div class="collapse" id="col3Content">
                        <div class="grid-12">
                            <div class="grid-10 desc">
                                <h4> Descrição </h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                                    laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>

                        <h3> Materiais </h3>
                        <table>
                            <tr>
                                <td class="material"> Material </td>
                                <td class="qtde"> qtde</td>
                            </tr>

                            <tr>
                                <td class="material"> Material </td>
                                <td class="qtde"> qtde</td>
                            </tr>
                        </table>
                    </div>
                </label>
            </div>

            <div class="grid-10 etapa">
                <label>
                    <h2> Nome da etapa </h2>
                    <input type="checkbox" />
                    <div class="collapse" id="col3Content">
                        <div class="grid-12">
                            <div class="grid-10 desc">
                                <h4> Descrição </h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                                    laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>

                        <h3> Materiais </h3>
                        <table>
                            <tr>
                                <td class="material"> Material </td>
                                <td class="qtde"> qtde</td>
                            </tr>

                            <tr>
                                <td class="material"> Material </td>
                                <td class="qtde"> qtde</td>
                            </tr>
                        </table>
                    </div>
                </label>
            </div>

            <div class="grid-10">
                <div class="titulo">
                    <h1> Lista geral de materiais </h1>
                </div>

                <div class="grid-12 etapa">
                    <h2> Nome do projeto </h2>
                    <h3> Materiais </h3>
                    <table>
                
                        <tr>
                            <td class="material"> Material </td>
                            <td class="qtde"> qtde</td>
                        </tr>
    
                        <tr>
                            <td class="material"> Material </td>
                            <td class="qtde"> qtde</td>
                        </tr>
                    </table>
                </div>
            </div>

        </main>
    </div>
</body>
</html>