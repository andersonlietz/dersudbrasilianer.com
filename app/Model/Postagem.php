<?php
class Postagem
{
    public static function selecionaTodos()
    {
        $con = Connection::getConn();
        
        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();
        while($row = $sql->fetchObject('Postagem')){
            $resultado[] = $row;

        }
        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro no Banco de Dados.");
        }
        return $resultado;
    }
    public static function selecionaPorId($idPost)
    {
        $con = $Connection::getConn();
        $sql = "SELECT * FROM postagens WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro no banco de dados.");
        }else{

            $resultado->comentarios = Postagem::selecionarComentarios($resultado->id);

            if(!$resultado->comentarios){
                $resultado->comentarios = 'Não existe nenhum comentário para esta postagem.';

            }
        }

        return $resultado;
    }
}