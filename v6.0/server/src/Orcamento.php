<?php

if(isset($_POST['dataOrc'])) {

    class MyDB extends SQLite3
        {
        function __construct()
        {
            $this->open('../database/pleng.db');
        }
    }

    $db = new MyDB();

    $orcamento = new Orcamento($db);

    $dados = $_POST['dataOrc']; 
    $infos = json_decode($dados, true);

    $qtde =  $orcamento->retornaQtdeParaOrcamento($infos['material'], $infos['levantamento']);
   
    $qtdeSemVirgula = str_replace(',', '.', $qtde['qtde']);
    $tamTotalSemVirgula = str_replace(',', '.', $qtde['tamanho_total']);

    $qtdeTotal = floatval($tamTotalSemVirgula) * floatval($qtdeSemVirgula);

    echo number_format($qtdeTotal, 2);
}

class Orcamento 
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarOrcamento(object $orcamento)
    {
        $insertOrcamento = $this->sqlite->prepare('INSERT INTO orcamento(idlevantamento, idmaterial, qtde_comprada, qtde_faltante, fornecedor, data_compra, valor_compra)
                                                    --VALUES(:idlevantamento, :idmaterial, :qtde_comprada, :qtde_faltante, :fornecedor, :data_compra, :valor_compra)
                                                    VALUES(:idlevantamento, :idmaterial, :qtde_comprada, :qtde_faltante, :fornecedor, :data_compra, :valor_compra)');
        
    $insertOrcamento->bindParam(':idlevantamento', $orcamento->idlevantamento);  
    $insertOrcamento->bindParam(':idmaterial', $orcamento->idmaterial);  
    $insertOrcamento->bindParam(':qtde_comprada', $orcamento->qtde_comprada);  
    $insertOrcamento->bindParam(':qtde_faltante',  $orcamento->qtde_faltante);  
    $insertOrcamento->bindParam(':fornecedor', $orcamento->fornecedor);  
    $insertOrcamento->bindParam(':data_compra', $orcamento->data_compra);  
    $insertOrcamento->bindParam(':valor_compra', $orcamento->valor_compra); 

        $insertOrcamento->execute();
    }

    public function listarOrcamento(int $levantamento)
    {
        $listaOrcamento = $this->sqlite->prepare('SELECT orcamento.*, material.nome 
                                                    FROM orcamento
                                                    INNER JOIN material
                                                    ON orcamento.idmaterial = material.idmat
                                                    WHERE idlevantamento = :id
                                                    ORDER BY data_compra DESC');

        $listaOrcamento->bindParam(':id', $levantamento);

        $orcamentos = $listaOrcamento->execute();

        return $orcamentos;
    }
    
    public function selecionarOrcamento(int $id) 
    {
        $selectOrcamento = $this->sqlite->prepare('SELECT orcamento.*, material.nome 
                                                    FROM orcamento
                                                    INNER JOIN material
                                                    ON orcamento.idmaterial = material.idmat 
                                                    where idorcamento = :id');
        
        $selectOrcamento->bindParam(':id', $id);
    
        $orc = $selectOrcamento->execute()->fetchArray();
    
        return $orc;
    }

    public function editarOrcamento(object $orcamento)
    {
        $updateOrcamento = $this->sqlite->prepare('UPDATE orcamento SET
                                                    qtde_comprada = :qtde_comprada,
                                                    qtde_faltante = :qtde_faltante,
                                                    fornecedor = :fornecedor,
                                                    data_compra = :data_compra,
                                                    valor_compra = :valor_compra
                                                   WHERE idorcamento = :idorcamento');
 
        $updateOrcamento->bindParam(':qtde_comprada', $orcamento->qtde_comprada);  
        $updateOrcamento->bindParam(':qtde_faltante',  $orcamento->qtde_faltante);  
        $updateOrcamento->bindParam(':fornecedor', $orcamento->fornecedor);  
        $updateOrcamento->bindParam(':data_compra', $orcamento->data_compra);  
        $updateOrcamento->bindParam(':valor_compra', $orcamento->valor_compra); 
        $updateOrcamento->bindParam(':idorcamento', $orcamento->idorcamento);  

        $updateOrcamento->execute();
    }

    public function deletarOrcamento(int $idorcamento)
    {
        $deleteOrcamento = $this->sqlite->prepare('DELETE FROM orcamento WHERE idorcamento = :idorcamento');
                                
        $deleteOrcamento->bindParam(':idorcamento', $idorcamento);

        $deleteOrcamento->execute();
    }

    public function retornaQtdeParaOrcamento(int $idmat, int $idlevantamento) 
    {
        $selectInfos = $this->sqlite->prepare('SELECT qtde, tamanho_total
                                                FROM material_etapa
                                                inner join levantamento_inicial
                                                on material_etapa.idetapa = levantamento_inicial.idetapa
                                                where idmat = :idmat
                                                and idlevantamento = :idlevantamento');

        $selectInfos->bindParam(':idmat', $idmat);
        $selectInfos->bindParam(':idlevantamento', $idlevantamento);

        $infos = $selectInfos->execute()->fetchArray();

        return $infos;
    }

    public function gerarInfosRelatorio(int $idlevantamento)
    {
        $selectRel = $this->sqlite->prepare('SELECT orcamento.*, material.nome as material, etapa.nome as etapa
                                             FROM orcamento
                                                INNER JOIN material
                                                ON orcamento.idmaterial = material.idmat
                                                INNER JOIN levantamento_inicial
                                                ON levantamento_inicial.idlevantamento = orcamento.idlevantamento
                                                INNER JOIN etapa
                                                ON levantamento_inicial.idetapa = etapa.idetapa
                                             WHERE orcamento.idlevantamento = :id
                                             ORDER BY data_compra DESC');

        $selectRel->bindParam(':id', $idlevantamento);

        $infosRel = $selectRel->execute();

        return $infosRel;
    }
}

?>