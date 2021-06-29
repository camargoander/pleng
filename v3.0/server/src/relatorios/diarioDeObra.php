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
        $iddiario = $_POST['data'];
        $diario = json_decode($iddiario, true);

        $result = $db->query("SELECT * FROM diariodeobra WHERE iddiario = $diario");

        while ($row = $result->fetchArray()) {
            $this->SetFont('Arial','b',12);
            $this->Cell(78,8,utf8_decode($row['data']. ' - ' .$row['nome']),0, 0, 'L');
            $this->Ln();     

             // Header
            foreach($header as $col) {
                $this->SetFont('Arial','b',11);

                if($col == 'Periodo')  {
                    $this->Cell(30,8,$col,0);
                } else{
                    $this->Cell(20,8,$col,0);
                }
            }

            $this->Ln();

            $this->SetFont('Arial','',10);

            $this->Cell(30,8,utf8_decode('Manhã'),0);
            $this->Cell(20,8,utf8_decode($row['temsegmanha']),1);
            $this->Cell(20,8,utf8_decode($row['temtermanha']),1);
            $this->Cell(20,8,utf8_decode($row['temquamanha']),1);
            $this->Cell(20,8,utf8_decode($row['temquimanha']),1);
            $this->Cell(20,8,utf8_decode($row['temsexmanha']),1);

            $this->Ln();

            $this->Cell(30,8,utf8_decode('Tarde'),0);
            $this->Cell(20,8,utf8_decode($row['temsegtarde']),1);
            $this->Cell(20,8,utf8_decode($row['temtertarde']),1);
            $this->Cell(20,8,utf8_decode($row['temquatarde']),1);
            $this->Cell(20,8,utf8_decode($row['temquitarde']),1);
            $this->Cell(20,8,utf8_decode($row['temsextarde']),1);

            $this->Ln();
            $this->Ln();

            $this->SetFont('Arial','b',11);
            $this->Cell(78,8,utf8_decode('Observação'),0, 0, 'L');
            $this->Ln();

            $this->SetFont('Arial','',10);
            $this->Cell(130,8,utf8_decode($row['observacao']),1);

            $this->Ln();
            $this->Ln();

            $this->SetFont('Arial','b',12);
            $this->Cell(78,8,utf8_decode('Etapas alteradas'),0, 0, 'L');
            $this->Ln(); 

            $resultEtapa = $db->query("SELECT * FROM etapa_diario WHERE iddiario = $diario");

            while ($rowEtapa = $resultEtapa->fetchArray()) {
                $this->SetFont('Arial','b',11);
                $this->Cell(78,8,utf8_decode('nome'),0, 0, 'L');
                $this->Ln();
                
                $this->SetFont('Arial','',10);

                $this->Cell(20,8,utf8_decode('Tamanho atual'),1);
                $this->Cell(20,8,utf8_decode('Tamanho total'),1);
                $this->Ln();

                $this->Cell(20,8,utf8_decode($rowEtapa['tamanho_atual']),1);
                $this->Cell(20,8,utf8_decode($rowEtapa['tamanho_total']),1);
                $this->Ln();

                $this->Cell(20,8,utf8_decode('Unidade'),1);
                $this->Cell(20,8,utf8_decode('Posição'),1);
                $this->Cell(20,8,utf8_decode('Situação'),1);
                $this->Ln();
                
                $this->Cell(20,8,utf8_decode($rowEtapa['unidade']),1);
                $this->Cell(20,8,utf8_decode($rowEtapa['pos']),1);
                $this->Cell(20,8,utf8_decode($rowEtapa['situacao']),1);
                $this->Ln();

                $this->Cell(20,8,utf8_decode('Descrição'),1);
                $this->Ln();

                $this->Cell(20,8,utf8_decode($rowEtapa['descricao']),1);
                $this->Ln();
                $this->Ln();

            }

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

$header = array('Periodo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta');

$pdf->BasicTable($header);

$pdf->Output();
?>