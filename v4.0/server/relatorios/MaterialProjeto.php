<?php

session_start();

require('./fpdf/fpdf.php');
require('../src/Projeto.php');
require('../src/LevantamentoInicial.php');
require('../src/MaterialEtapa.php');

require('../config/redireciona.php');

header("Content-type: text/html; charset=utf-8");

if(!isset($_SESSION['projeto'])) {
    redireciona('../../web/pages/projetos/index.php');
}

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../database/pleng.db');
   }
}

$db = new MyDB();


class PDF extends FPDF
{
    function Header()
    {
        global $db;
        
        $data = date('d/m/Y');
        // Logo
        $this->Image('../../web/assets/imgs/logo.png',10,6, 30, 30, '', '');
        
        $this->SetFont('Arial','B',8);

        $this->Cell(80);
        $this->Ln(5);

    //     // Title
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,utf8_decode('Relatório de materiais por etapa'),0,5,'C');
        $this->SetFont('Arial','B',10);

        $Projetos = new Projeto($db);

        $projeto = $Projetos->selecionarProjeto($_SESSION['projeto']);

        $this->Cell(0,10,utf8_decode('Projeto: '. $projeto['nome']),0,0,'C');

        $this->SetFont('Arial','B',8);

        $this->Cell(-4,-5, $data,0,5,'R');

        $this->Cell(0,-5,utf8_decode('Página: '.$this->PageNo().' de {nb}'),0,0,'R');

        $this->Ln(30);
    }
    
    // Page footer
     function Footer()
     {
         // Position at 1.5 cm from bottom
         $this->SetY(-15);
         // Arial italic 8
         $this->SetFont('Arial','I',8);
         // Page number
         $this->Cell(0,10,'Pleng - Planejamento de engenharia',0,0,'C');
    }

    // Simple table
    function BasicTable($header)
    {
        global $db;

        $Levantamentos = new LevantamentoInicial($db);

        $levantamento = $Levantamentos->listarLevantamento($_SESSION['projeto']);

        while ($row = $levantamento->fetchArray()) {
            $this->SetFont('Arial','b',10);
            $this->Cell(92,8,utf8_decode('Etapa: ' .$row['nome']),0, 0, 'L');
            $this->Ln();

            // Header
            foreach($header as $col) {
                $this->SetFont('Arial','b',11);
                
                $this->Cell(92,8,$col,1);
                
            }

            $this->Ln();

            $Materiais = new MaterialEtapa($db);

            $material = $Materiais->selecionarMateriaisEtapa($row['idetapa']);
            
            while($rowMaterial = $material->fetchArray()) {
                $this->SetFont('Arial','',8);

                $this->Cell(92,8,utf8_decode($rowMaterial['nome']),1);
                $this->Cell(92,8,utf8_decode($rowMaterial['qtde']),1);

                $this->Ln();
            }   
            $this->Ln();         
        }   
    }
}


$pdf = new PDF();

// title
$title = 'Relatório de materiais por etapa';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->Ln();

$header = array('Material', 
                 utf8_decode('Quantidade utilizada até o momento'),
                 utf8_decode('Quantidade a ser utilizada até o final'));

$pdf->BasicTable($header);

$pdf->Output();
?>

<!-- SELECT SUM(levantamento_inicial.tamanho_total) AS tamanhoTotal, 
       material.nome,
       SUM(material_etapa.qtde),
       SUM(material_etapa.qtde * levantamento_inicial.tamanho_total) AS total,
       MAX(material_etapa_diario.qtde) AS atual 
       --(MAX(material_etapa_diario.qtde) * levantamento_inicial.tamanho_total) AS qtdeAtual
   FROM levantamento_inicial
   INNER JOIN material_etapa ON material_etapa.idetapa = levantamento_inicial.idetapa
   INNER JOIN material_etapa_diario ON material_etapa_diario.idmatetapa = material_etapa.idmatetapa
   INNER JOIN material ON material.idmat = material_etapa.idmat
   WHERE levantamento_inicial.idprojeto = 1 
   GROUP BY material_etapa.idmat -->