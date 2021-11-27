<?php 

class DiarioDeObra
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarDiarioDeObra(object $diario, object $previsaoTempo, object $etapa)
    {
        $insertDiario = $this->sqlite->prepare('INSERT INTO diario_obra( datadiario, nome, observacao, idprojeto) 
                                                VALUES (:datadiario, :nome, :observacao, :idprojeto)');
                                
        $insertDiario->bindParam(':datadiario', $diario->datadiario);
        $insertDiario->bindParam(':nome', $diario->nome);
        $insertDiario->bindParam(':observacao', $diario->observacao);
        $insertDiario->bindParam(':idprojeto', $diario->idprojeto);

        $insertDiario->execute();

        $this->cadastrarPrevisaoTempo($previsaoTempo);
        $this->cadastrarEtapa($etapa);
    }

    private function cadastrarPrevisaoTempo(object $previsaoTempo)
    {
        $insertPrevisao = $this->sqlite->prepare('INSERT INTO previsao_tempo(
                                                    temsegmanha, temsegtarde, 
                                                    temtermanha, temtertarde, 
                                                    temquamanha, temquatarde, 
                                                    temquimanha, temquitarde, 
                                                    temsexmanha, temsextarde, iddiario)
                                                VALUES (:temsegmanha, :temsegtarde, 
                                                        :temtermanha, :temtertarde, 
                                                        :temquamanha, :temquatarde, 
                                                        :temquimanha, :temquitarde, 
                                                        :temsexmanha, :temsextarde, 
                                                        (
                                                            SELECT MAX(iddiario) FROM diario_obra
                                                            WHERE idprojeto = :idprojeto
                                                        )
                                                       )');
                                
        
        $insertPrevisao->bindParam(':temsegmanha', $previsaoTempo->temsegmanha);
        $insertPrevisao->bindParam(':temsegtarde', $previsaoTempo->temsegtarde);
        $insertPrevisao->bindParam(':temtermanha', $previsaoTempo->temtermanha);
        $insertPrevisao->bindParam(':temtertarde', $previsaoTempo->temtertarde);
        $insertPrevisao->bindParam(':temquamanha', $previsaoTempo->temquamanha);
        $insertPrevisao->bindParam(':temquatarde', $previsaoTempo->temquatarde);
        $insertPrevisao->bindParam(':temquimanha', $previsaoTempo->temquimanha);
        $insertPrevisao->bindParam(':temquitarde', $previsaoTempo->temquitarde);
        $insertPrevisao->bindParam(':temsexmanha', $previsaoTempo->temsexmanha);
        $insertPrevisao->bindParam(':temsextarde', $previsaoTempo->temsextarde);
        
        $insertPrevisao->bindParam(':idprojeto', $previsaoTempo->idprojeto);

        $insertPrevisao->execute();
    }

    private function cadastrarEtapa(object $etapa)
    {
        $insertEtapaDiario = $this->sqlite->prepare('INSERT INTO etapa_diario(
                                                        iddiario, idlevantamento, qtde
                                                    ) VALUES (
                                                        (
                                                            SELECT MAX(iddiario) FROM diario_obra
                                                            WHERE idprojeto = :idprojeto
                                                        ), :idlevantamento, :qtde)');
                                
        $insertEtapaDiario->bindParam(':idprojeto', $etapa->idprojeto);
        $insertEtapaDiario->bindParam(':idlevantamento', $etapa->idlevantamento);
        $insertEtapaDiario->bindParam(':qtde', $etapa->qtde);

        $insertEtapaDiario->execute();
    }

    public function editarDiarioDeObra(object $diario)
    {
        $updateDiario = $this->sqlite->prepare('UPDATE diario_obra SET 
                                                    datadiario = :datadiario, 
                                                    nome = :nome, 
                                                    observacao = :observacao
                                                WHERE iddiario = :iddiario) ');
                                
        $updateDiario->bindParam(':datadiario', $diario->datadiario);
        $updateDiario->bindParam(':nome', $diario->nome);
        $updateDiario->bindParam(':observacao', $diario->observacao);
        $updateDiario->bindParam(':iddiario', $diario->iddiario);

        $updateDiario->execute();
    }

    public function editarPrevisaoTempo(object $diario)
    {
        $updatePrevisao = $this->sqlite->prepare('UPDATE diario_obra SET 
                                                    temsegmanha = :temsegmanha, 
                                                    temsegtarde = :temsegtarde, 
                                                    temtermanha = :temtermanha, 
                                                    temtertarde = :temtertarde, 
                                                    temquamanha = :temquamanha, 
                                                    temquatarde = :temquatarde, 
                                                    temquimanha = :temquimanha, 
                                                    temquitarde = :temquitarde, 
                                                    temsexmanha = :temsexmanha, 
                                                    temsextarde = :temsextarde
                                                WHERE idprev = :idprev) ');
                                
        $updatePrevisao->bindParam(':temsegmanha', $diario->temsegmanha);
        $updatePrevisao->bindParam(':temsegtarde', $diario->temsegtarde);
        $updatePrevisao->bindParam(':temtermanha', $diario->temtermanha);
        $updatePrevisao->bindParam(':temtertarde', $diario->temtertarde);
        $updatePrevisao->bindParam(':temquamanha', $diario->temquamanha);
        $updatePrevisao->bindParam(':temquatarde', $diario->temquatarde);
        $updatePrevisao->bindParam(':temquimanha', $diario->temquimanha);
        $updatePrevisao->bindParam(':temquitarde', $diario->temquitarde);
        $updatePrevisao->bindParam(':temsexmanha', $diario->temsexmanha);
        $updatePrevisao->bindParam(':temsextarde', $diario->temsextarde);
        $updatePrevisao->bindParam(':idprev', $diario->idprev);

        $updatePrevisao->execute();
    }

    public function excluirDiario(int $iddiario)
    {
        $deleteDiario = $this->sqlite->prepare('DELETE FROM diario_obra WHERE iddiario = :iddiario');

        $deleteDiario->bindParam(':iddiario', $iddiario);

        $deleteDiario->execute();
    }

    public function listarDiario(int $idprojeto)
    {
        $selectDiario = $this->sqlite->prepare('SELECT * FROM diario_obra WHERE idprojeto = :idprojeto');

        $selectDiario->bindParam(':idprojeto', $idprojeto);

        $diarios = $selectDiario->execute();

        return $diarios;
    }

    public function listarDiarioFiltrado(int $idprojeto, string $nome, string $dataDiario)
    {
        if(!empty($nome) && !empty($dataDiario)) {
            $expressao = "upper(nome) LIKE :filtro AND  datadiario = :data";
        }

        if(empty($nome) && !empty($dataDiario)) {
            $expressao = "datadiario = :data";
        }

        if(!empty($nome) && empty($dataDiario)) {
            $expressao = "upper(nome) LIKE :filtro";
        }

        if(empty($nome) && empty($dataDiario)) {
            return $this->listarDiario($idprojeto);
        }

        $selectDiarioFiltrados = $this->sqlite->prepare('SELECT * FROM diario_obra 
                                                WHERE idprojeto = :idprojeto AND ' . $expressao);
                                
        $selectDiarioFiltrados->bindParam(':idprojeto', $idprojeto);
        
        if(!empty($nome) && !empty($dataDiario)) {
            $selectDiarioFiltrados->bindParam(':filtro', $nome);
            $selectDiarioFiltrados->bindParam(':data', $dataDiario);
        }

        if(empty($nome) && !empty($dataDiario)) {
            $selectDiarioFiltrados->bindParam(':data', $dataDiario);
        }

        if(!empty($nome) && empty($dataDiario)) {
            $nome = '%' . strtoupper($nome) . '%';
            $selectDiarioFiltrados->bindParam(':filtro', $nome);
        }

        $diariosFiltrados = $selectDiarioFiltrados->execute();

        return $diariosFiltrados;
    }

    
}

?>