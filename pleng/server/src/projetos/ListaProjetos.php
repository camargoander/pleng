<?php

include('../../database/conexao.php');

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    $result = $db->query('SELECT * FROM projetos');

    while($row = $result->fetchArray()) {
        include('./Projeto/index.php');
    }
}

?>
