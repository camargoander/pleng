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

$id = $_SESSION['idProjAtivo'];
$nome = $_POST['nome'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$empreiteiro = $_POST['empreiteiro'];
$descricao = $_POST['descricao'];
$data = $_POST['data_inicio'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE projeto SET
                            nome = '$nome',
                            estado = '$estado',
                            cidade = '$cidade',
                            endereco = '$endereco',
                            idemp = '$empreiteiro',
                            descricao = '$descricao',
                            data_inicio = '$data'
                          WHERE idproj = '$id'");

    $result = $db->query("SELECT * FROM projeto WHERE idproj = '$id'");;

    while ($row = $result->fetchArray()) {
        $_SESSION['idProjAtivo'] = $row['idproj'];
        $_SESSION['nomeProjAtivo'] = $row['nome'];
        $_SESSION['descProjAtivo'] = $row['descricao'];
        // $_SESSION['estProjAtivo'] = $row['estado'];
        // $_SESSION['cidProjAtivo'] = $row['cidade'];
        $_SESSION['endProjAtivo'] = $row['endereco'];
        // $_SESSION['empProjAtivo'] = $row['idemp'];
        $_SESSION['dataProjAtivo'] = $row['data_inicio'];
    }

    header('location:../../../web/pages/projetos/editar/index.php');
}

?>