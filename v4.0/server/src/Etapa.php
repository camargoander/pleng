<?php

class Etapa
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function listarEtapa()
    {
        $selectEtapa = $this->sqlite->prepare('SELECT * FROM etapa');

        $etapa = $selectEtapa->execute();

        return $etapa;
    }

    public function listarEtapaComFiltro(string $filtro)
    {
        $selectEtapaComFiltro = $this->sqlite->prepare('SELECT * FROM etapa
                                                WHERE upper(nome)
                                                LIKE :filtro');

        $selectEtapaComFiltro->bindParam(':filtro', $filtro);

        $etapaFiltrada = $selectEtapaComFiltro->execute();

        return $etapaFiltrada;
    }

    public function deletarEtapa(int $id)
    {

        $this->deletarMaterialEtapa($id);

        $deleteEtapa = $this->sqlite->prepare('DELETE FROM etapa WHERE idetapa = :id');
                                
        $deleteEtapa->bindParam(':id', $id);

        $deleteEtapa->execute();
    }

    private function deletarMaterialEtapa(int $id)
    {
        $deleteMatEtapa = $this->sqlite->prepare('DELETE FROM material_etapa WHERE idetapa = :id');
                                
        $deleteMatEtapa->bindParam(':id', $id);

        $deleteMatEtapa->execute();
    }

    public function cadastrarEtapa(string $nome, array $materiais)
    {
        $insertEtapa = $this->sqlite->prepare('INSERT INTO etapa(nome) 
                                                VALUES (:nome)');
                                
        $insertEtapa->bindParam(':nome', $nome);

        $insertEtapa->execute();

        $this->cadastrarMaterialEtapa($materiais);
    }

    private function cadastrarMaterialEtapa(array $materiais)
    {
        $id = $this->selecionaUltimaEtapa();

        foreach($materiais as $material) {
            $material = json_decode($material);
            
            $insertMatEtapa = $this->sqlite->prepare('INSERT INTO material_Etapa(idetapa, idmat, qtde) 
                                                    VALUES (:etapa, :material, :qtde)');

            $insertMatEtapa->bindParam(':etapa', $id);
            $insertMatEtapa->bindParam(':material', $material->id);
            $insertMatEtapa->bindParam(':qtde', $material->qtde);

            $insertMatEtapa->execute();
        }
    }

    private function selecionaUltimaEtapa()
    {
        $selectUltimaEtapa = $this->sqlite->prepare('SELECT MAX(idetapa) AS id FROM etapa');

        $ultimaEtapa = $selectUltimaEtapa->execute()->fetchArray();

        return $ultimaEtapa['id'];
    }
}
?>