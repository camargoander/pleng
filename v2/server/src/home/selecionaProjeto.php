<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

$db = new MyDB();

$idproj = $_POST['id'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM projeto WHERE idproj = '$idproj'");
    
    while ($row = $result->fetchArray()) {
        $dateStart = new DateTime($row['data_inicio']);
        $dateNow   = new DateTime(date('Y-m-d'));
        $dateDiff = $dateStart->diff($dateNow);
    }

    $qtdeDias = $dateDiff->d;

    $result = $db->query("UPDATE projeto SET qtde_dias = '$qtdeDias' WHERE idproj = '$idproj'");

    $resultSel = $db->query("SELECT * FROM projeto WHERE idproj = '$idproj'");

    while ($row = $resultSel->fetchArray()) {
        $_SESSION['idProjAtivo'] = $row['idproj'];
        $_SESSION['nomeProjAtivo'] = $row['nome'];
        $_SESSION['descProjAtivo'] = $row['descricao'];
        $_SESSION['estProjAtivo'] = $row['estado'];
        $_SESSION['cidProjAtivo'] = $row['cidade'];
        $_SESSION['endProjAtivo'] = $row['endereco'];
        $_SESSION['empProjAtivo'] = $row['idemp'];
        $_SESSION['dataProjAtivo'] = $row['data_inicio'];
        $_SESSION['diasProjAtivo'] = $row['qtde_dias'];
    }

    header('location:../../../web/pages/projetos/editar/index.php');
}
?>