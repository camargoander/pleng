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

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$empreiteiro = $_POST['empreiteiro'];
$data = $_POST['data_inicio'];

$usuario = $_SESSION['idUsuAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO projeto(nome, descricao, estado, cidade, endereco, idemp, data_inicio, idusu) 
                          VALUES ('".$nome."','".$descricao."','".$estado."','".$cidade."','".$endereco."','".$empreiteiro."','".$data."', '".$usuario."')");

    header('location:../../../web/pages/home/index.php');
}


?>