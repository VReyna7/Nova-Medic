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

    try{
        $admin->veriData($nombre, $apellido, $pass, $mail, $sex, $fech);
        if(!$admin->extAdmin($mail)){
            $admin->newAdmin();
            $admin->sesionAdmin($mail);
            $sesion->setAdminActual($admin->getId());
            header("location: ../vistas/creacionCuentas.php");
        }else{
            $error = "Error. Este correo ya esta en uso";
            header("location: ../vistas/registroAdministradores.php");
        }
    }catch(Exception $e){
        $error = $e->getMessage();
        header("location: ../vistas/registroAdministradores.php");
    }
