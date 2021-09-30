<?php 

class DiarioDeObra
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarDiarioDeObra(object $diario)
    {
        $insertDiario = $this->sqlite->prepare('INSERT INTO diario_obra( datadiario, nome, observacao, idproj) 
                                                VALUES (:datadiario, :nome, :observacao, :idproj)');
                                
        $insertDiario->bindParam(':datadiario', $diario->datadiario);
        $insertDiario->bindParam(':nome', $diario->nome);
        $insertDiario->bindParam(':observacao', $diario->observacao);
        $insertDiario->bindParam(':idproj', $diario->idproj);

        $insertDiario->execute();

        $this->cadastrarPrevisaoTempo($diario);
    }

    public function cadastrarPrevisaoTempo(object $diario)
    {
        $insertPrevisao = $this->sqlite->prepare('INSERT INTO previsao_tempo(
                                                    temsegmanha, temsegtarde, 
                                                    temtermanha, temtertarde, 
                                                    temquamanha, temquatarde, 
                                                    temquimanha, temquitarde, 
                                                    temsexmanha, temsextarde, iddiario)');
                                
        
        $insertPrevisao->bindParam(':temsegmanha', $diario->temsegmanha);
        $insertPrevisao->bindParam(':temsegtarde', $diario->temsegtarde);
        $insertPrevisao->bindParam(':temtermanha', $diario->temtermanha);
        $insertPrevisao->bindParam(':temtertarde', $diario->temtertarde);
        $insertPrevisao->bindParam(':temquamanha', $diario->temquamanha);
        $insertPrevisao->bindParam(':temquatarde', $diario->temquatarde);
        $insertPrevisao->bindParam(':temquimanha', $diario->temquimanha);
        $insertPrevisao->bindParam(':temquitarde', $diario->temquitarde);
        $insertPrevisao->bindParam(':temsexmanha', $diario->temsexmanha);
        $insertPrevisao->bindParam(':temsextarde', $diario->temsextarde);

        $insertPrevisao->execute();
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
}

?>