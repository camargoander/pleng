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

        $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nome_etapa
                              FROM etapa_projeto, etapa WHERE etapa_projeto.idproj = $id
                              AND etapa_projeto.idetapa = etapa.idetapa");

        while ($row = $result->fetchArray()) {
            $this->SetFont('Arial','b',12);
            $this->Cell(78,8,utf8_decode('> ' .$row['nome_etapa']),0, 0, 'L');
            $this->Ln();

             // Header
            foreach($header as $col) {
                $this->SetFont('Arial','b',11);

                if($col == 'Unidade') {
                    $this->Cell(33,8,$col,1);
                } else {
                    $this->Cell(78,8,$col,1);
                }
            }

            $this->Ln();

            $resultMat = $db->query("SELECT etapa_projeto.idetapaproj, material.unidade, 
                                etapa_projeto.tamanho_total, 
                                material.nome, qtde_material.qtde, 
                                (qtde_material.qtde * etapa_projeto.tamanho_total) as qtde_final 
                                FROM etapa_projeto 
                                INNER JOIN qtde_material ON etapa_projeto.idetapa = qtde_material.idetapa 
                                INNER JOIN material ON qtde_material.idmat = material.idmat 
                                WHERE qtde_material.idgrupo = etapa_projeto.idgrupo  
                                AND etapa_projeto.idetapa = " .$row['idetapa']. "
                                AND etapa_projeto.idetapaproj = " .$row['idetapaproj']);
            
            while($rowMaterial = $resultMat->fetchArray()) {
                $this->SetFont('Arial','',10);

                $this->Cell(78,8,utf8_decode($rowMaterial['nome']),1);
                $this->Cell(33,8,utf8_decode($rowMaterial['unidade']),1);
                $this->Cell(78,8,utf8_decode($rowMaterial['qtde_final']),1);

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

// titulo
$pdf->SetFont('Arial','b',14);
$pdf->Cell(190,10, utf8_decode($title), 0, 0, 'C');

$pdf->Ln();
$pdf->Ln();

$header = array('Material', 'Unidade', utf8_decode('Quantidade total para a execução'));

$pdf->BasicTable($header);

$pdf->Output();
?>  
