<?php

class Empreiteiro
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarEmpreiteiro(string $nome)
    {
        $insertEmpreiteiro = $this->sqlite->prepare('INSERT INTO empreiteiro(nome) 
                                                VALUES (:nome)');
                                
        $insertEmpreiteiro->bindParam(':nome', $nome);

        $insertEmpreiteiro->execute();
    }

    public function editarEmpreiteiro(string $nome, int $idemp)
    {
        $insertEmpreiteiro = $this->sqlite->prepare('UPDATE empreiteiro SET nome = :nome WHERE idemp = :idemp');
                                
        $insertEmpreiteiro->bindParam(':nome', $nome);
        $insertEmpreiteiro->bindParam(':idemp', $idemp);

        $insertEmpreiteiro->execute();
    }

    public function deletarEmpreiteiro(int $idemp)
    {
        $deleteEmpreiteiro = $this->sqlite->prepare('DELETE FROM empreiteiro WHERE idemp = :idemp');
                                
        $deleteEmpreiteiro->bindParam(':idemp', $idemp);

        $deleteEmpreiteiro->execute();
    }

    public function listarEmpreiteiro()
    {
        $selectEmpreiteiro = $this->sqlite->prepare('SELECT * FROM empreiteiro');

        $empreiteiros = $selectEmpreiteiro->execute();

        return $empreiteiros;
    }
}

?>