<?php

class LevantamentoInicial 
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarLevantamentoInicial(object $levantamento)
    {
        $insertLevantamento = $this->sqlite->prepare('INSERT INTO levantamento_inicial(idetapa, tamanhototal, posicao, situacao, descricao, idproj)
                                                VALUES(:idetapa, :tamanhototal, :posicao, :situacao, :descricao, :idproj)');
        
        $insertLevantamento->bindParam(':idetapa', $levantamento->idetapa);
        $insertLevantamento->bindParam(':tamanhototal', $levantamento->tamanhototal);
        $insertLevantamento->bindParam(':posicao', $levantamento->posicao);
        $insertLevantamento->bindParam(':situacao', $levantamento->situacao);
        $insertLevantamento->bindParam(':descricao', $levantamento->descricao);
        $insertLevantamento->bindParam(':idproj', $levantamento->idproj);

        $insertLevantamento->execute();
    }

    public function editarLevantamentoInicial(object $levantamento)
    {
        $updateLevantamento = $this->sqlite->prepare('UPDATE levantamento_inicial SET
                                                        tamanhototal = :tamanhototal,
                                                        posicao = :posicao,
                                                        situacao = :situacao,
                                                        descricao = :descricao
                                                    WHERE idlevantamento = :idlevantamento');
        
        $updateLevantamento->bindParam(':tamanhototal', $levantamento->tamanhototal);
        $updateLevantamento->bindParam(':posicao', $levantamento->posicao);
        $updateLevantamento->bindParam(':situacao', $levantamento->situacao);
        $updateLevantamento->bindParam(':descricao', $levantamento->descricao);
        $updateLevantamento->bindParam(':idlevantamento', $levantamento->idlevantamento);

        $updateLevantamento->execute();
    }

    public function deletarLevantamentoInicial(int $idlevantamento)
    {
        $deleteLevantamento = $this->sqlite->prepare('DELETE FROM levantamento_inicial WHERE idlevantamento = :idlevantamento');

        $deleteLevantamento->bindParam(':idlevantamento', $idlevantamento);

        $deleteLevantamento->execute();
    }

    public function listarLevantamentoInicialAndamento(int $idprojeto)
    {
        $selectLevantamentoAndamento = $this->sqlite->prepare('SELECT * FROM levantamento_inicial WHERE idprojeto = :idprojeto AND situacao = "A"');

        $selectLevantamentoAndamento->bindParam(':idprojeto', $idprojeto);

        $levantamentoAndamento = $selectLevantamentoAndamento->execute();

        return $levantamentoAndamento;
    }

    public function listarLevantamentoInicialFinalizado(int $idprojeto)
    {
        $selectLevantamentoFinalizado = $this->sqlite->prepare('SELECT * FROM levantamento_inicial WHERE idprojeto = :idprojeto AND situacao = "F"');

        $selectLevantamentoFinalizado->bindParam(':idprojeto', $idprojeto);

        $levantamentoFinalizado = $selectLevantamentoFinalizado->execute();

        return $levantamentoFinalizado;
    }

    public function listarLevantamentoInicialNaoIniciada(int $idprojeto)
    {
        $selectLevantamentoNaoIniciada = $this->sqlite->prepare('SELECT * FROM levantamento_inicial WHERE idprojeto = :idprojeto AND situacao = "N"');

        $selectLevantamentoNaoIniciada->bindParam(':idprojeto', $idprojeto);

        $levantamentoNaoIniciada = $selectLevantamentoNaoIniciada->execute();

        return $levantamentoNaoIniciada;
    }
}

?>