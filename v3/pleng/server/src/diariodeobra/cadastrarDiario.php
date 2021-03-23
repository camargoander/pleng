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

$data = $_POST['data_diario'];

$segManha = $_POST['climasegundamanha'];
$segTarde = $_POST['climasegundatarde'];
$terManha = $_POST['climatercamanha'];
$terTarde = $_POST['climatercatarde'];
$quaManha = $_POST['climaquartamanha'];
$quaTarde = $_POST['climaquartarde'];
$quiManha = $_POST['climaquintamanha'];
$quiTarde = $_POST['climaquintatarde'];
$sexManha = $_POST['climasextamanha'];
$sexTarde = $_POST['climasextatarde'];

$projeto = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO diariodeobra(data_diario, segManha, segTarde, terManha, terTarde, quaManha, quaTarde, quiManha, quiTarde, sexManha, sexTarde, idproj) 
    VALUES ('".$data."', '".$segManha."', '".$segTarde."', '".$terManha."', '".$terTarde."', '".$quaManha."', '".$quaTarde."', '".$quiManha."', '".$quiTarde."', '".$sexManha."', '".$sexTarde."', $projeto)");

    $_SESSION['diarioIniciado'] = true;

    header('location:../../../web/pages/diariodeobra/cadastrar/index.php');
}


?>
