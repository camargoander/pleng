<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../server/database/pleng.db');
   }
}

$id = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM diariodeobra WHERE idproj = $id");

    while ($row = $result->fetchArray()) {
        echo "
        <tr>
            <td> ".$row['nome']." </td>
            <td class='data'> ".$row['data']." </td>
            <td class='porcentagem'> ".$row['porcentagem']." </td>
        </tr>
        ";
    }
}

?>
