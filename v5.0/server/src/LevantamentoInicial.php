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
        $insertLevantamento = $this->sqlite->prepare('INSERT INTO levantamento_inicial(idetapa, idprojeto, situacao, descricao, tamanho_total, tamanho_atual)
                                                VALUES(:idetapa, :idproj, :situacao, :descricao, :tamanhototal, :tamanhoatual)');
        
        $insertLevantamento->bindParam(':idetapa', $levantamento->idetapa);
        $insertLevantamento->bindParam(':idproj', $levantamento->idproj);
        $insertLevantamento->bindParam(':situacao', $levantamento->situacao);
        $insertLevantamento->bindParam(':descricao', $levantamento->descricao);
        $insertLevantamento->bindParam(':tamanhototal', $levantamento->tamanhototal);
        $insertLevantamento->bindParam(':tamanhoatual', $levantamento->tamanhoatual);

        $insertLevantamento->execute();
    }

    public function editarLevantamentoInicial(object $levantamento)
    {
        $updateLevantamento = $this->sqlite->prepare('UPDATE levantamento_inicial SET
                                                        tamanho_total = :tamanhototal,
                                                        situacao = :situacao,
                                                        descricao = :descricao
                                                    WHERE idlevantamento = :idlevantamento');
        
        $updateLevantamento->bindParam(':tamanhototal', $levantamento->tamanhototal);
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

    public function listarLevantamento(int $idprojeto) 
    {
        $selectLevantamento = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome, etapa.unidade 
                                                                FROM levantamento_inicial 
                                                                INNER JOIN etapa 
                                                                ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                WHERE idprojeto = :idprojeto');

        $selectLevantamento->bindParam(':idprojeto', $idprojeto);

        $levantamento = $selectLevantamento->execute();

        return $levantamento;
    }

    public function listarLevantamentoInicialAndamento(int $idprojeto)
    {
        $selectLevantamentoAndamento = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome  
                                                                    FROM levantamento_inicial 
                                                                    INNER JOIN etapa 
                                                                    ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                    WHERE idprojeto = :idprojeto 
                                                                    AND situacao = "A"');

        $selectLevantamentoAndamento->bindParam(':idprojeto', $idprojeto);

        $levantamentoAndamento = $selectLevantamentoAndamento->execute();

        return $levantamentoAndamento;
    }

    public function listarLevantamentoInicialFinalizado(int $idprojeto)
    {
        $selectLevantamentoFinalizado = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome  
                                                                    FROM levantamento_inicial 
                                                                    INNER JOIN etapa 
                                                                    ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                    WHERE idprojeto = :idprojeto 
                                                                    AND situacao = "F"');

        $selectLevantamentoFinalizado->bindParam(':idprojeto', $idprojeto);

        $levantamentoFinalizado = $selectLevantamentoFinalizado->execute();

        return $levantamentoFinalizado;
    }

    public function listarLevantamentoInicialNaoIniciado(int $idprojeto)
    {
        $selectLevantamentoNaoIniciada = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome  
                                                                    FROM levantamento_inicial 
                                                                    INNER JOIN etapa 
                                                                    ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                    WHERE idprojeto = :idprojeto 
                                                                    AND situacao = "N"');

        $selectLevantamentoNaoIniciada->bindParam(':idprojeto', $idprojeto);

        $levantamentoNaoIniciada = $selectLevantamentoNaoIniciada->execute();

        return $levantamentoNaoIniciada;
    }

    public function listarLevantamentoInicialAndamentoFiltrado(int $idprojeto, int $idetapa)
    {
        $selectLevantamentoAndamento = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome  
                                                                    FROM levantamento_inicial 
                                                                    INNER JOIN etapa 
                                                                    ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                    WHERE idprojeto = :idprojeto 
                                                                    AND situacao = "A"
                                                                    AND levantamento_inicial.idetapa = :idetapa');

        $selectLevantamentoAndamento->bindParam(':idprojeto', $idprojeto);
        $selectLevantamentoAndamento->bindParam(':idetapa', $idetapa);

        $levantamentoAndamento = $selectLevantamentoAndamento->execute();

        return $levantamentoAndamento;
    }

    public function listarLevantamentoInicialFinalizadoFiltrado(int $idprojeto, int $idetapa)
    {
        $selectLevantamentoFinalizado = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome  
                                                                    FROM levantamento_inicial 
                                                                    INNER JOIN etapa 
                                                                    ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                    WHERE idprojeto = :idprojeto 
                                                                    AND situacao = "F"
                                                                    AND levantamento_inicial.idetapa = :idetapa');

        $selectLevantamentoFinalizado->bindParam(':idprojeto', $idprojeto);
        $selectLevantamentoFinalizado->bindParam(':idetapa', $idetapa);

        $levantamentoFinalizado = $selectLevantamentoFinalizado->execute();

        return $levantamentoFinalizado;
    }

    public function listarLevantamentoInicialNaoIniciadoFiltrado(int $idprojeto, int $idetapa)
    {
        $selectLevantamentoNaoIniciada = $this->sqlite->prepare('SELECT levantamento_inicial.*, etapa.nome  
                                                                    FROM levantamento_inicial 
                                                                    INNER JOIN etapa 
                                                                    ON levantamento_inicial.idetapa = etapa.idetapa 
                                                                    WHERE idprojeto = :idprojeto 
                                                                    AND situacao = "N"
                                                                    AND levantamento_inicial.idetapa = :idetapa');

        $selectLevantamentoNaoIniciada->bindParam(':idprojeto', $idprojeto);
        $selectLevantamentoNaoIniciada->bindParam(':idetapa', $idetapa);

        $levantamentoNaoIniciada = $selectLevantamentoNaoIniciada->execute();

        return $levantamentoNaoIniciada;
    }

    public function selecionarLevantamentoInicial(int $id)
    {
        $selectLevantamentoEspecifico = $this->sqlite->prepare('SELECT * FROM levantamento_inicial
                                                                    WHERE idlevantamento = :id');

        $selectLevantamentoEspecifico->bindParam(':id', $id);

        $levantamentoEspecifico = $selectLevantamentoEspecifico->execute()->fetchArray();

        return $levantamentoEspecifico;
    }
}

?>