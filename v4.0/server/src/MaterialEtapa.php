<?php

if(isset($_POST['data'])) {

    class MyDB extends SQLite3
        {
        function __construct()
        {
            $this->open('../database/pleng.db');
        }
    }

    $db = new MyDB();

    $materialEtapa = new MaterialEtapa($db);

    $dados = $_POST['data']; 
    $infos = json_decode($dados, true);

    $materiais = array();

    $materialLista =  $materialEtapa->selecionarMateriaisEtapa($infos['etapa']);
    
    while($mt = $materialLista->fetchArray()) {
        array_push($materiais, $mt);
    }

    echo json_encode($materiais);
}

class MaterialEtapa
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function selecionarMateriaisEtapa(int $id)
    {
        $selectMateriaisEtapa = $this->sqlite->prepare('SELECT material_etapa.*, material.nome 
                                                                    FROM material_etapa 
                                                                    INNER JOIN material    
                                                                    ON material_etapa.idmat = material.idmat 
                                                                    WHERE material_etapa.idetapa = :id');

        $selectMateriaisEtapa->bindParam(':id', $id);

        $materiaisEtapa = $selectMateriaisEtapa->execute();

        return $materiaisEtapa;
    }

    public function deletarMaterialEtapa(int $id)
    {
        $deleteMatEtapa = $this->sqlite->prepare('DELETE FROM material_etapa WHERE idetapa = :id');
                                
        $deleteMatEtapa->bindParam(':id', $id);

        $deleteMatEtapa->execute();
    }

    public function cadastrarMaterialEtapa(array $materiais)
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

    public function editarMaterialEtapa(int $idetapa, array $materiais)
    {
        $this->deletarMaterialEtapa($idetapa);

        foreach($materiais as $material) {
            $material = json_decode($material);
            
            $insertMatEtapa = $this->sqlite->prepare('INSERT INTO material_Etapa(idetapa, idmat, qtde) 
                                                    VALUES (:etapa, :material, :qtde)');

            $insertMatEtapa->bindParam(':etapa', $idetapa);
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

    public function infoMaterialProjeto(int $projeto)
    {
        $selectMateriaisEtapaProjeto = $this->sqlite->prepare('SELECT levantamento_inicial.tamanho_total AS tamanhoTotal, 
                                                                    material.nome,
                                                                    material_etapa.qtde,
                                                                    (material_etapa.qtde * levantamento_inicial.tamanho_total) AS total,
                                                                    (MAX(material_etapa_diario.qtde) * levantamento_inicial.tamanho_total) AS qtdeAtual
                                                                FROM levantamento_inicial
                                                                INNER JOIN material_etapa ON material_etapa.idetapa = levantamento_inicial.idetapa
                                                                INNER JOIN material_etapa_diario ON material_etapa_diario.idmatetapa = material_etapa.idmatetapa
                                                                INNER JOIN material ON material.idmat = material_etapa.idmat
                                                                WHERE levantamento_inicial.idprojeto = :id 
                                                                GROUP BY material_etapa.idmat');

        $selectMateriaisEtapaProjeto->bindParam(':id', $projeto);

        $materiaisEtapaProjeto = $selectMateriaisEtapaProjeto->execute();

        return $materiaisEtapaProjeto;
    }
}

?>