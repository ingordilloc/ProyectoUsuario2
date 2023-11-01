<?php

namespace Controller;

use Model\UsuarioModel;

class UsuarioController{

    public function login(){
        if(!empty (  $_POST['usuario']) && !empty (  $_POST['pasword'])){
            $usuario = strClean($_POST['usuario']);
        $password = strClean(($_POST['pasword']));
        //$password= password_hash($password , PASSWORD_DEFAULT);
            $datos = array(
                'usuario' => $usuario,
            );
            $respuesta = UsuarioModel::login($datos);
            $resultado = password_verify($password, $respuesta['password']);
               echo $resultado;
               return 0;
            if ($resultado == true){//hubo coincidencia
                $_SESSION['usuario']= $respuesta['usuario'];
                $_SESSION['nombres']= $respuesta['nombres'];
                $_SESSION['apellidos']= $respuesta['apellidos']; 
                 
                $_SESSION['id']= $respuesta['id'];
                $_SESSION['rol']= $respuesta['rol'];
                header("Location: index.php?action=inicio&id={$respuesta['id']}");

            }else {
                //mensaje error
                return "ERROR";
            }
        }
    }

    public function logout(){
        session_destroy();
        //session_unset() otras opciones a utilizar
        header("location: index.php?action=inicio");
    }

    public function crearUsuarioEstudiante(){
        if(!empty($_POST['usuario']) && !empty($_POST['pasword']) && !empty($_POST['nombres']) && !empty($_POST['apellidos'])){
            
            $usuario=strClean($_POST['usuario']);
            $password= strClean($_POST['pasword']);
            
            $password= password_hash($password , PASSWORD_ARGON2ID);//contraseña cifrada
            $nombres= strClean($_POST['nombres']);
            $apellidos= strClean(($_POST['apellidos']));

            $datos=array(
                'usuario'=> $usuario,
                'pasword'=> $password,
                'nombres'=> $nombres,
                'apellidos'=> $apellidos,
                'rol'=> '1',
            );
            //print_r($datos);
            
            $respuesta= UsuarioModel::guardarUsuarioEstudiante($datos);
            echo $respuesta;
            //return 0;
            //return $respuesta;
        }
    }

}
?>