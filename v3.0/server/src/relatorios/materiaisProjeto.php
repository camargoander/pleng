<?php

include("mpdf60/mpdf.php");

$html = "
<div class='grid-12'>
<h1> Lista de materiais do projeto </h1>

<br/>

<h3> nome do projeto </h3>
<table>
    <tr>
        <td> Nome </td>
        <td> Quantidade </td>
    </tr>
</table>
</div>
";

$mpdf=new mPDF();

$mpdf->SetDisplayMode('fullpage');

// add css
$css = file_get_contents("css/estilo.css");

$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;
?>