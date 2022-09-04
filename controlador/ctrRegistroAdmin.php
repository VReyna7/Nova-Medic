<?php  
    require_once('../modelo/class.conexion.php');
    require_once('../modelo/class.admin.php');
    require_once('../modelo/class.sesion.php');

    $admin = new Admin();
    $sesion = new Sesion();

    $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
    $apellido = isset($_POST['ape'])?$_POST['ape']:"";
    $pass = isset($_POST['pass'])?$_POST['pass']:"";
    $mail = isset($_POST['mail'])?$_POST['mail']:"";
    $sex = isset($_POST['sex'])?$_POST['sex']:"";
    $fech = isset($_POST['fecha'])?$_POST['fecha']:"";
    $subjet = "Tus Creendiales, ¡Bienvenido nuevo Administrador!";
    $mensaje= "correo: ".$mail." "."contra: "." ".$pass;
    $headers = "From: Nova-Medic";
    try{
        $admin->veriData($nombre, $apellido, $pass, $mail, $sex, $fech);
        if(!$admin->extAdmin($mail)){
            $admin->newAdmin();
             mail($mail,$subject,$mensaje, $headers);
            $admin->sesionAdmin($mail);
            $sesion->setAdminActual($admin->getId());
            email($mail,$subjet,$mensaje,$headers);
            header("location: ../vistas/creacionCuentas.php");
        }else{
            $error = "Error. Este correo ya esta en uso";
            header("location: ../vistas/registroAdministradores.php");
        }
    }catch(Exception $e){
        $error = $e->getMessage();
        header("location: ../vistas/registroAdministradores.php");
    }
