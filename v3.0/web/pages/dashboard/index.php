<html>
    <head>
        <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
        <title> Pleng | Dashboard </title>
    </head>

    <body>

        <div id="page-dashboard" class="container">
        
        <?php include('../../assets/cmp/menulateral/index.php'); ?>
            
            <header>
                <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
            </header>

            <main class="dash">

                <div class="grid-12">
                    <div class="titulo">
                        <h1> Dashboard do projeto </h1>
                    </div>

                    <div class="grid-4">
                        <h3> Quantidade gasta até o momento </h3>
                        
                        <?php
                            SetFileFormat("png");

                            $grafico->SetTitle("Quantidade gasta até o momento");
                            $grafico->SetXTitle("Mês");
                            $grafico->SetYTitle("Valor");

                            $dados = array(
                                array('Janeiro', 10),
                                array('Fevereiro', 5),
                                array('Março', 4),
                                array('Abril', 8),
                                array('Maio', 7),
                                array('Junho', 5),
                            );

                            // $graph->SetPlotType("pie");
                            $grafico->SetDataValues($dados);
                            $grafico->DrawGraph();
                        ?>

                    </div>

                    <div class="grid-8">
                        <h3> Materiais usados e necessários até a conclusão </h3>

                        <?php
                            SetFileFormat("png");

                            $dados = array(
                                array('White', 10),
                                array('Gold', 5),
                                array('Silver', 4),
                            );

                            $plot = new PHPlot();

                            $plot->SetPlotType('pie');
                            $plot->SetDataType('text-data-single');
                            $plot->SetDataValues($data);

                            foreach ($data as $row) 
                                $plot->SetLegend($row[0]); // Copy labels to legend
                        
                            $plot->DrawGraph();
                        ?>


                    </div>
                </div>

                <div class="grid-12">
                    <div class="grid-8">
                        <h3> Etapas </h3>
                    </div>
                    <div class="grid-4">
                        <h3> Porcentagem de conclusão do projeto </h3>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
