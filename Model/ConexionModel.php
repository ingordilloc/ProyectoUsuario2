<?php

namespace Model;

    class ConexionModel{
        public static function conectar(){
            $conn = new \PDO("mysql:host=localhost;dbname=cursos","root","og101200");
                            
            return $conn;
        }

    }

?>