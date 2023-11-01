<?php
namespace Model;

use Model\ConexionModel;


class InscripcionModel{
    public static function guardarInscripcion($datos){
          try {  
        $stmt = ConexionModel::conectar()->prepare("INSERT INTO inscripcion (fecha, fkUsuario, fkCurso) VALUES (:fecha, :usuario, :curso) "); //statement -> declaracion
                                                                                                      //comodines no valores definitivos
        $stmt->bindParam(":curso", $datos['idcurso'], \PDO::PARAM_STR);//por ser texto STR y el otro INT
        //bindParam la no ejecucion de Codigo SQL solo guardar.      //No estamos instanciando el objeto solo haciendo referencia, por eso "\"
        $stmt->bindParam(":usuario", $_SESSION['id'], \PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos['fecha'], \PDO::PARAM_STR);
        return $stmt->execute() ? true: false;//Ejecucion de la consulta.
    }catch( \Throwable $th ){
        return false;
    }
    
    }
    

    public static function mostrarInscripcion(){
        $stmt = ConexionModel::conectar()->prepare("SELECT inscripcion.id as idinscripcion, curso, usuario.nombres as nombre FROM inscripcion INNER JOIN curso on curso.id=fkCurso INNER JOIN usuario on usuario.id = fkUsuario");
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public static function mostrarInscripcionOtros($idrole){
        $stmt = ConexionModel::conectar()->prepare("SELECT inscripcion.id as idinscripcion, curso, usuario.nombres as nombre FROM inscripcion INNER JOIN curso on curso.id=fkCurso INNER JOIN usuario on usuario.id = fkUsuario where usuario.id = :id ");
        $stmt->bindParam(':id',$idrole,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }


    public static function editarInscripcion($idInscripcion){
        //consulta con where = id
        $stmt = ConexionModel::conectar()->prepare("SELECT curso, inscripcion.id as idinscripcion FROM inscripcion INNER JOIN curso on fkCurso=curso.id where inscripcion.id =:id ");
        $stmt->bindParam(':id',$idInscripcion,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//cuando solo es un registro, se utiliza fetch
    }


    public static function actualizarInscripcion($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE inscripcion SET fkCurso = :curso WHERE  inscripcion.id = :id ");
        $stmt->bindParam(':curso',$datos['idcurso'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idinscripcion'],\PDO::PARAM_INT);

        return $stmt->execute() ? true : false;

    }

    public static function borrarInscripcion($idInscripcion){
        $stmt = ConexionModel::conectar()->prepare("SELECT inscripcion.id as idinscripcion, curso FROM inscripcion INNER JOIN curso on fkCurso = curso.id WHERE  inscripcion.id = :id ");
        $stmt->bindParam(':id',$idInscripcion,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();


    }
 public static function borrarConfirmadoInscripcion($id){
    if(!empty($_POST['idInscripcion'])){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM inscripcion WHERE id =:id");
        $stmt->bindParam(':id', $id,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;

    }
 }

}

?>