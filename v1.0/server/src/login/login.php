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

$email = $_POST['email'];
$senha = $_POST['senha'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query('SELECT * FROM usuario');

    while($row = $result->fetchArray()) {
      if(($email === $row['email']) && ($senha === $row['senha'])) {
         $_SESSION['idUsuAtivo'] = $row['idusu'];
         $_SESSION['nomeUsuAtivo'] = $row['nome'];

         header('location:../../../web/pages/home/index.php');
      } else {
        header('location:../../../web/pages/login/index.php');
      }
    }
}

?>