<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../../server/database/pleng.db');
   }
}

$db = new MyDB();

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query('SELECT * FROM material_etapa');

    while($row = $result->fetchArray()) {

        $resultMat = $db->query("SELECT material_etapa.*, etapa.nome as nomeetapa, material.* FROM material_etapa
                                INNER JOIN etapa ON material_etapa.idetapa = etapa.idetapa 
                                INNER JOIN material ON material_etapa.idmat = material.idmat 
                                WHERE material_etapa.idetapa = " .$row['idetapa'] );

        while ($row = $result->fetchArray()) {

            include('./materialetapa/index.php');
        }
    }
   

    
    
}

?>