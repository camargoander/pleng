<?

session_start();

require('../../fpdf/fpdf.php');

header("Content-type: text/html; charset=utf-8");

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

class PDF extends FPDF
{

    // Simple table
    function BasicTable($header)
    {
        $db = new MyDB();
        $id = $_SESSION['idProjAtivo'];

        $result = $db->query("SELECT * FROM projeto WHERE idproj = $id");

        while ($row = $result->fetchArray()) {
            $this->SetFont('Arial','b',12);
            $this->Cell(88,8,utf8_decode('Projeto: ' .$row['nome']),0, 0, 'L');
            $this->Ln();

             // Header
            foreach($header as $col) {
                $this->SetFont('Arial','b',11);

                $this->Cell(88,8,$col,1);
                
            }

            $this->Ln();

            $resultMat = $db->query("SELECT etapa_projeto.tamanho_total, material.nome, qtde_material.qtde, (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde_final, 
                                SUM(qtde_material.qtde * etapa_projeto.tamanho_total) as soma  
                                FROM etapa_projeto 
                                INNER JOIN qtde_material ON etapa_projeto.idetapa = qtde_material.idetapa 
                                INNER JOIN material ON qtde_material.idmat = material.idmat 
                                WHERE etapa_projeto.idproj = $id group by qtde_material.idmat");
            
            while($rowMaterial = $resultMat->fetchArray()) {
                $this->SetFont('Arial','',10);

                $this->Cell(88,8,utf8_decode($rowMaterial['nome']),1);
                $this->Cell(88,8,utf8_decode($rowMaterial['qtde_final']),1);

                $this->Ln();
            }   
            $this->Ln();         
        }   
    }
}

$pdf = new PDF();

// title
$title = 'Relatório de materiais do projeto';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();

// titulo
$pdf->SetFont('Arial','b',14);
$pdf->Cell(190,10, utf8_decode($title), 0, 0, 'C');

$pdf->Ln();
$pdf->Ln();

$header = array('Material', 'Quantidade total');

$pdf->BasicTable($header);

$pdf->Output();
?>