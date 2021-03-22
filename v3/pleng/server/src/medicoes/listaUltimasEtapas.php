<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../../server/database/pleng.db');
   }
}

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query('SELECT * FROM diariodeobra INNER JOIN levantamentoinicial ON levantamentoinicial.idproj = projeto.idproj LIMIT 5');

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