<?php

session_start();

$status = $_SESSION['status'];
$usuario = $_SESSION['usuario'];
$id = $_SESSION['idproj'];

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$empreiteiro = $_POST['empreiteiro'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];

include('../../database/conexao.php');

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    if($status === 'C') {
        $db->exec("INSERT INTO projetos(nome, endereco, cidade, descricao, id_usuario, id_empreiteiro, data_criacao_obra) 
               VALUES ('$nome', '$endereco', '$cidade', '$descricao', '$usuario', '$empreiteiro', '$data_inicio')");

        header('location:../../../web/pages/home/index.php');

    } else if($status === 'E') {
        $db->exec("UPDATE projetos SET 
                    nome = '".$nome."', 
                    endereco = '".$endereco."', 
                    cidade = '".$cidade."', 
                    descricao = '".$descricao."', 
                    id_usuario = '".$usuario."', 
                    id_empreiteiro = '".$empreiteiro."', 
                    data_criacao_obra = '".$data_inicio."'
                   WHERE id = '".$id."'");

        header('location:./SelecionarProjeto.php');
    }
}

?>