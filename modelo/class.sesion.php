<?php
class Sesion{
    //Setea la sesion del cliente activo
    public function setClienteActual($user){
        $_SESSION['cliente']=$user;
    }

    //Setea la sesion del doctor actual
    public function setDoctorActual($user){
        $_SESSION['doctor']=$user;
    }

    //Setea la sesion del admin actual
    public function setAdminActual($user){
        $_SESSION['admin']=$user;
    }

    //Obtiene los datos de las sesiones activas
    public function getAdminActual(){
        return $_SESSION['admin'];
    }

    public function getClienteActual(){
        return $_SESSION['cliente'];
    }

    public function getDoctorActual(){
        return $_SESSION['doctor'];
    }

    //Cierra la sesion
    public function cerrarSesion(){
        session_unset();
        session_destroy();
    }
}
?>