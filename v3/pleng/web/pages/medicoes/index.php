<html>
<head>
    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | Medições </title>

</head>

<body>
    <div id="page-medicoes" class="container">

    <?php include('../../assets/cmp/menulateral/index.php'); ?>
    
        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <div class="grid-12">
            <main>
                <div class="titulo">
                    <h1> medições </h1>
                </div>

                <form class="grid-5">
                    <h2> Levantamento inicial </h2>
                    <img src="../../assets/imgs/iconmed1.svg" />
                    <div>
                        <button type="button" class="grid-6 btnBranco"> Editar </button>
                        <button type="button" class="grid-6 btnVerde"> Criar </button>
                    </div>
                </form>
                <form class="grid-5">
                    <h2> Diário de obra </h2>
                    <img src="../../assets/imgs/iconmed2.svg" />
                    <div>
                        <button type="button" class="grid-6 btnBranco"> Editar </button>
                        <button type="button" class="grid-6 btnVerde"> Criar </button>
                    </div>
                </form>
                <div class="titulo">
                    <h1> Últimos levantamentos </h1>
                </div>

                <table>
                    <tr>
                        <td> Nome da etapa </td>
                        <td class="data"> 06/03/2021 </td>
                        <td class="porcentagem"> 60% </td>
                    </tr>
                    <tr>
                        <td> Nome da etapa </td>
                        <td class="data"> 01/03/2021 </td>
                        <td class="porcentagem"> 30% </td>
                    </tr>
                </table>
            </main>
        </div>
    </div>
</body>
</html>