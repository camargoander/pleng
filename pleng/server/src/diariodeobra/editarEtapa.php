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

$idproj = $_SESSION['idProjAtivo'];
$iddiario = $_SESSION['idDiarioAtivo'];

$idetapaproj = $_POST['etapa'];
$idmaterial = $_POST['material'];
$tamanho_atual = $_POST['tamanhoatual'];
$qtde_atual = $_POST['qtdematatual'];

$page = $_POST['Editar'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE etapa_projeto SET
                            tamanho_atual = '$tamanho_atual',
                            iddiario = '$iddiario'
                          WHERE idproj = '$idproj'
                          AND idetapaproj = '$idetapaproj'");

    $result = $db->query("SELECT material_etapa.idmatetapa as idmatetapa FROM material_etapa
                        INNER JOIN etapa_projeto ON etapa_projeto.idetapa = material_etapa.idetapa
                        WHERE etapa_projeto.idproj = $idproj
                        AND etapa_projeto.idetapaproj = $idetapaproj
                        AND material_etapa.idmat = $idmaterial");

    


    while ($row = $result->fetchArray()) {
        $idmatetapa = $row['idmatetapa'];

        $resultMep = $db->query("SELECT COUNT(idmep) as contador FROM material_etapa_proj 
                            WHERE idproj = $idproj AND idmatetapa = $idmatetapa");


         while ($rowMep = $resultMep->fetchArray()) {
            if($rowMep['contador'] > 0) {
                $resultUp = $db->query("UPDATE material_etapa_proj SET
                                    qtde_atual = '$qtde_atual'
                                    WHERE idproj = $idproj AND
                                    idmatetapa = $idmatetapa");
                
            } else {
                $resultIn = $db->query("INSERT INTO material_etapa_proj(idproj, idmatetapa, qtde_atual)
                                        VALUES('".$idproj."', '".$idmatetapa."', '".$qtde_atual."')");
            }
        }
    }

    if($page === 'editar') {
        header('location:../../../web/pages/diariodeobra/editar/index.php');   
    } else if($pae === 'etapaCadastro'){
        header('location:../../../web/pages/diariodeobra/etapasCadastro/index.php');    
    }

    }

?>