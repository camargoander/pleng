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
        $selectOrcamento = $this->sqlite->prepare('SELECT orcamento.*, material.nome 
                                                    FROM orcamento
                                                    INNER JOIN material
                                                    ON orcamento.idmaterial = material.idmat
                                                    WHERE idlevantamento = :id
                                                    ORDER BY data_compra DESC');

        $selectOrcamento->bindParam(':id', $levantamento);

        $orcamentos = $selectOrcamento->execute();

        return $orcamentos;
    }
}

?>