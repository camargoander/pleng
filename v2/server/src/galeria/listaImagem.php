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

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    
    $result = $db->query('SELECT * FROM foto WHERE idproj = ' .$_SESSION['idProjAtivo']);

    
    while ($row = $result->fetchArray()) {
        
        include('./img/index.php');
    }
}

?>