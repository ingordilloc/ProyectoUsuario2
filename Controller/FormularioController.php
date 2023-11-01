<?php

namespace Controller;

require_once('Librerias/Exception.php'); //Traits
require_once('Librerias/PHPMailer.php');
require_once('Librerias/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class FormularioController{
    
    public function procesarFormulario(){
        if(!empty($_POST['email']) and !empty($_POST['nombre']) and !empty($_POST['comentario'])){
            //empty -> Validar si la variable está instanciada y también tiene datos
            //isset -> Validar si la variable está instanciada
            $email = $_POST['email'];
            $nombre =$_POST['nombre'];
            $comentario = $_POST['comentario'];

            $mail = new PHPMailer(true);
            try{
                //probar enviar el correo
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->Username = "renevj3@gmail.com";
                $mail->Password = "hrkalffhuailjuqe";
                $mail->CharSet = 'UTF-8';

                $mail->setFrom("renevj3@gmail.com",'De');
                $mail->addAddress("renevj3@gmail.com",'Para');//A donde se enviará el correo

                $mail->isHTML(true);
                $mail->Subject = "Informacion cursos";

                $mail->Body = "
                Contactar a: <strong>{$nombre}</strong> <br/>
                email: <strong>{$email}</strong> <br/>
                Comentario: <strong>{$comentario}</strong>
                ";
                //$mail->addAttachment('archivo.pdf','archivo.pdf');
                $mail->send();

                echo "
                     <div class='alert alert-success' role='alert'>
                        Correo enviado, te estaremos contactando.
                    </div>
                ";
            }catch(Exception $e){
                echo "Error: {$mail->ErrorInfo}";
            }

        }
        else{
            //header("Location: index.php?action=error");//Redirección
        }
    }

}

?>