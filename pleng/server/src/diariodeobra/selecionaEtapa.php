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

$etapaSelecionada = $_POST['data'];
$etapa = json_decode($etapaSelecionada, true);

if(!$etapa) {
    $etapa = 1;
}

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM etapa_projeto WHERE idetapaproj = $etapa");

    while ($row = $result->fetchArray()) {
        echo $row['tamanho_total'];
    }

}
?>
