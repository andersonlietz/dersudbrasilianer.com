<?php


 class Comentario{
        public static function selecionarComentarios($idPost){

            $con = $connection::getConn();

            $sql = "SELECT * FROM comentario WHERE id_postagem = :id";
            $sql = $con->prepare();
            $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
            $sql->execute();

            $resultado = array();

            while($row = $sql->fetchObject('Comentario')){
                $resultado[] = $row;

            }
            return $resultado;
        }

 }