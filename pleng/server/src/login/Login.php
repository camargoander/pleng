<?php

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

include('../../database/conexao.php');

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    $result = $db->query('SELECT * FROM usuario');

    while($row = $result->fetchArray()) {
        if(($email === $row['email']) && ($senha === $row['senha'])) {
            // login ok
            $_SESSION['usuario'] = $row['idusuario'];
            
            header('location:../../../web/pages/home');
        } else {
            // erro no login
            header('location:../../../web/pages/login');
        }
    }
}


?>
