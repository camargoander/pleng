<?php

class Material
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarMaterial(object $material)
    {
        $insertMaterial = $this->sqlite->prepare('INSERT INTO material(nome, nome_fornecedor, unidade, preco) 
                                                VALUES (:nome, :nome_fornecedor, :unidade, :preco)');
                                
        $insertMaterial->bindParam(':nome', $material->nome);
        $insertMaterial->bindParam(':nome_fornecedor', $material->nome_fornecedor);
        $insertMaterial->bindParam(':unidade', $material->unidade);
        $insertMaterial->bindParam(':preco', $material->preco);

        $insertMaterial->execute();
    }

    public function editarMaterial(object $material)
    {
        $updateMaterial = $this->sqlite->prepare('UPDATE material SET 
                                                    nome = :nome,
                                                    nome_fornecedor = :nome_fornecedor,
                                                    unidade = :unidade,
                                                    preco = :preco 
                                                WHERE idmat = :idmat');
                                
        $updateMaterial->bindParam(':nome', $material->nome);
        $updateMaterial->bindParam(':nome_fornecedor', $material->nome_fornecedor);
        $updateMaterial->bindParam(':unidade', $material->unidade);
        $updateMaterial->bindParam(':preco', $material->preco);
        $updateMaterial->bindParam(':idmat', $material->idmat);

        $updateMaterial->execute();
    }

    public function deletarMaterial(int $idmat)
    {
        $deleteMaterial = $this->sqlite->prepare('DELETE FROM material WHERE idmat = :idmat');
                                
        $deleteMaterial->bindParam(':idmat', $idmat);

        $deleteMaterial->execute();
    }

    public function listarMaterial()
    {
        $selectMaterial = $this->sqlite->prepare('SELECT * FROM material');

        $materiais = $selectMaterial->execute();

        return $materiais;
    }
}

?>