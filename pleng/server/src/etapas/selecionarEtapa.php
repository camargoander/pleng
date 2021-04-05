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

$idetapaproj = $_POST['id']

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM etapa_projeto WHERE idetapaproj = '$idetapaproj'");

    while ($row = $result->fetchArray()) {
       $_SESSION['idEtapa'] = $row['idetapaproj'];
       $_SESSION['tamanhoEtapa'] = $row['tamanho_total'];
       $_SESSION['unidadeEtapa'] = $row['unidade'];
       $_SESSION['posEtapa'] = $row['pos'];
       $_SESSION['situacaoEtapa'] = $row['situacao'];
       $_SESSION['descricaoEtapa'] = $row['descricao'];
    }

    header('location:../../../web/pages/etapas/editar/index.php');
}
?>