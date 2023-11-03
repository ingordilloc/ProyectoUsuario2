<?php
namespace Model;

use Model\ConexionModel;


class UsuarioModel{
    

    public static function login($datos){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuario where usuario = :usuario");
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->execute();//Nos dira si hay un resultado que coincida
        return $stmt->fetch();//Devolviendo la respuesta

    }

    public static function guardarUsuarioEstudiante($datos){
        try {  
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO usuario (nombres, apellidos, usuario, password, rol) VALUES (:nombres, :apellidos, :usuario, :password, :rol) ");
            $stmt->bindParam(":nombres", $datos['nombres'], \PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $datos['apellidos'], \PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos['password'], \PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos['rol'], \PDO::PARAM_STR);
            return $stmt->execute() ? true: false;//Ejecucion de la consulta.
        }
        catch( \Throwable $th ){
        echo $th;
            //    return false;
        }
    }



}

?>