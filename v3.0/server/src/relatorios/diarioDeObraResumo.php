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

    // Page header
    function Header()
    {
        $data = date('d/m/Y');
        // Logo
        $this->Image('../../../web/assets/imgs/logo.svg',10,6,30);
        $this->SetFont('Arial','B',15);

        $this->Cell(80);
        // Title
        $this->Cell(30,10,'PLENG - Planejamento de engenharia',0,0,'C');
        $this->Cell(30,10, $data,0,0,'R');
        $this->Cell(0,10,'Página:  '.$this->PageNo().' de {nb}',0,0,'R');
        $this->Ln(20);
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
        $db = new MyDB();
        $id = $_SESSION['idProjAtivo'];

         // Header
         foreach($header as $col) {
            $this->SetFont('Arial','b',11);

            if($col == 'Data')  {
                $this->Cell(30,8,$col,1);
            } else if($col == 'Nome') {
                $this->Cell(60,8,$col,1);
            } else {
                $this->Cell(100,8,$col,1);
            }
        }

        $this->Ln();

        $result = $db->query("SELECT * FROM diariodeobra WHERE idproj = $id");

        while ($row = $result->fetchArray()) {
                $this->SetFont('Arial','',10);

                $this->Cell(30,8,utf8_decode($row['datadiario']),1);
                $this->Cell(60,8,utf8_decode($row['nome']),1);
                $this->Cell(100,8,utf8_decode($row['observacao']),1);

                $this->Ln();     
        }   
    }
}

$pdf = new PDF();

// title
$title = 'Relatório de diário de obra';
$pdf->SetTitle(utf8_decode($title));

// Iniciar pdf
$pdf->AddPage();

// titulo
$pdf->SetFont('Arial','b',14);
$pdf->Cell(190,10, utf8_decode($title), 0, 0, 'C');

$pdf->Ln();
$pdf->Ln();

$header = array('Data', 'Nome', utf8_decode('Observação'));

$pdf->BasicTable($header);

$pdf->Output();
?>