<?php

session_start();

$id = $_POST['id'];
$_SESSION['status'] = 'E';
$_SESSION['idproj'] = $id;

include('../../database/conexao.php');

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    $result = $db->query('SELECT * FROM projetos WHERE idprojeto = $id');

    while($row = $result->fetchArray()) {
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['endereco'] = $row['endereco'];
        $_SESSION['cidade'] = $row['cidade'];
        $_SESSION['empreiteiro'] = $row['empreiteiro'];
        $_SESSION['descricao'] = $row['descricao'];
        $_SESSION['data_inicio'] = $row['data_inicio'];
        $_SESSION['qtde_dias'] = $row['qtde_dias'];
    }

    header('location:../../../web/pages/projetos/cadastrar/index.php');
}
?>
