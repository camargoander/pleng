<?php

class Projeto
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarProjeto(object $projeto): void
    {
        $insertProjeto = $this->sqlite->prepare('INSERT INTO projeto(nome, descricao, endereco, cidade, estado, dataini, qtdedias, idemp, idusu)
                                                VALUES(:nome, :descricao, :endereco, :cidade, :estado, :dataini, :qtdedias, :idemp, :idusu)');
        
        $insertProjeto->bindParam(':nome', $projeto->nome);
        $insertProjeto->bindParam(':descricao', $projeto->descricao);
        $insertProjeto->bindParam(':endereco', $projeto->endereco);
        $insertProjeto->bindParam(':cidade', $projeto->cidade);
        $insertProjeto->bindParam(':estado', $projeto->estado);
        $insertProjeto->bindParam(':dataini', $projeto->dataini);
        $insertProjeto->bindParam(':qtdedias', $projeto->qtdedias);
        $insertProjeto->bindParam(':idemp', $projeto->idemp);
        $insertProjeto->bindParam(':idusu', $projeto->idusu);

        $insertProjeto->execute();
    }

    public function editarProjeto(object $projeto): void
    {
        $updateProjeto = $this->sqlite->prepare('UPDATE projeto SET
                                                    nome = :nome,
                                                    descricao = :descricao,
                                                    endereco = :endereco,
                                                    cidade = :cidade,
                                                    estado = :estado,
                                                    dataini = :dataini,
                                                    qtdedias = :qtdedias
                                                WHERE idproj = :idproj');
        
        $updateProjeto->bindParam(':nome', $projeto->nome);
        $updateProjeto->bindParam(':descricao', $projeto->descricao);
        $updateProjeto->bindParam(':endereco', $projeto->endereco);
        $updateProjeto->bindParam(':cidade', $projeto->cidade);
        $updateProjeto->bindParam(':estado', $projeto->estado);
        $updateProjeto->bindParam(':dataini', $projeto->dataini);
        $updateProjeto->bindParam(':qtdedias', $projeto->qtdedias);
        $updateProjeto->bindParam(':idproj', $projeto->idproj);

        $updateProjeto->execute();
    }

    public function deletarProjeto(int $id)
    {
        $deleteProjeto = $this->sqlite->prepare('DELETE FROM projeto WHERE idproj = :idproj');

        $deleteProjeto->bindParam(':idproj', $id);

        $deleteProjeto->execute();
    }

    public function listarProjetos(int $idusuario)
    {
        $selectProjeto = $this->sqlite->prepare('SELECT * FROM projeto WHERE idusuario = :idusu');

        $selectProjeto->bindParam(':idusu', $idusuario);

        $projetos = $selectProjeto->execute();

        return $projetos;
    }
}
?>