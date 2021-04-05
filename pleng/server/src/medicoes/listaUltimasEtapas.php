<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../server/database/pleng.db');
   }
}

$db = new MyDB();

$id = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT etapa_projeto.*, etapa.nome as nome_etapa, 
                          diariodeobra.iddiario as diario, diariodeobra.datadiario as datadiario
                          FROM etapa_projeto 
                          INNER JOIN etapa on etapa_projeto.idetapa = etapa.idetapa
                          INNER JOIN diariodeobra on etapa_projeto.iddiario = diariodeobra.iddiario
                          WHERE diariodeobra.idproj = $id AND etapa_projeto.idproj = $id 
                          ORDER BY datadiario DESC LIMIT 5");

    while ($row = $result->fetchArray()) {
        
        echo "
        <tr>
            <td> ".$row['diario']." </td>
            <td class='etapa'> ".$row['nome_etapa']." </td>
            <td class='data'> ".$row['datadiario']." </td>
        </tr>
        ";

    }
}

?>