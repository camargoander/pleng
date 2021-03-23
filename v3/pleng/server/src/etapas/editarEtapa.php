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

$id = $_SESSION['idEtapa'];
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

    $result = $db->query("UPDATE etapa_projeto SET
                            tamanho_total = '$tamanho_total',
                            unidade = '$unidade',
                            pos = '$pos',
                            situacao = '$situacao',
                            descricao = '$descricao'
                          WHERE idetapaproj = '$id'");

    $result = $db->query("SELECT * FROM etapa_projeto WHERE idetapaproj = '$id'");

    while ($row = $result->fetchArray()) {
        $_SESSION['tamanhoEtapa'] = $row['tamanho_total'];
        $_SESSION['unidadeEtapa'] = $row['unidade'];
        $_SESSION['posEtapa'] = $row['pos'];
        $_SESSION['situacaoEtapa'] = $row['situacao'];
        $_SESSION['descricaoEtapa'] = $row['descricao'];
    }

    header('location:../../../web/pages/etapas/listaetapas/index.php');
}

?>