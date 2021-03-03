<?php

session_start();

$_SESSION['status'] = 'C';

header('location:../../../web/pages/projetos/cadastrar/index.php');
?>
