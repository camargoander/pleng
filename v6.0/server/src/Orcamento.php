<?php

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
                                                    ON idorcamento = :id');
        
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
}

?>