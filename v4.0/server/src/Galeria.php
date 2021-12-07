<?php

class Galeria
{
    private $sqlite;

    public function __construct(MyDB $sqlite)
    {
        $this->sqlite = $sqlite;
    }

    public function cadastrarFoto(object $foto)
    {
        $nomeArquivo = $this->gerarNome($foto->foto);

        $insertFoto = $this->sqlite->prepare('INSERT INTO galeria(nome, descricao, data_foto, foto, idpasta) 
                                                VALUES (:nome, :descricao, :data_foto, :foto, :pasta)');
                                
        $insertFoto->bindParam(':nome', $foto->nome);
        $insertFoto->bindParam(':descricao', $foto->descricao);
        $insertFoto->bindParam(':data_foto', $foto->data_foto);
        $insertFoto->bindParam(':foto', $nomeArquivo);
        $insertFoto->bindParam(':pasta', $foto->pasta);

        $insertFoto->execute();
    }

    public function gerarNome($foto)
    {
        $extensao = strtolower(substr($foto['name'], -4)); //pega a extensao do arquivo
        $nomeFoto = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "./imgproj/"; //define o diretorio para onde enviar o arquivo
    
        if (move_uploaded_file($foto['tmp_name'], $diretorio.$nomeFoto)) {
        
            return $nomeFoto;
        }
    }

    public function listarFotos(int $id)
    {
        $selectFotos = $this->sqlite->prepare('SELECT * FROM galeria WHERE idpasta = :id');

        $selectFotos->bindParam(':id', $id);

        $fotos = $selectFotos->execute();

        return $fotos;
    }

    public function deletarFoto(int $idgaleria)
    {
        $deletarFoto = $this->sqlite->prepare('DELETE FROM galerida 
                                                        WHERE idgaleria = :idgaleria');
                                
        $deletarFoto->bindParam(':idgaleria', $idgaleria);

        $deletarFoto->execute();
    }
}
?>