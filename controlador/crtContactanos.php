<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.cotactanos.php');


$Nombre = isset($_POST['Nombre'])?$_POST['Nombre']:"";
$apellido = isset($_POST['apellido'])?$_POST['apellido']:"";
$sexo = isset($_POST['sexo'])?$_POST['sexo']:"";
$correo = isset($_POST['correo'])?$_POST['correo']:"";
$contac = new contactos();
$desti = 'willcastell05@gmail.com';
$argu = 'Propuesta para brindar ayuda a las persona para darles asistencia medica';
$mensaje ="Mi nombre es:" . $Nombre ."\nY mi correo electronico es" . $correo . "\n Y me gustaria ayudar a las personas";


try{  
    mail($desti,$argu,$mensaje);
    $contac->veriData($Nombre, $apellido, $sexo, $correo );
    $contac->newContactos();
    header("location:../index.html");
} catch (Exception $e){
    $error = $e->getMessage();
    include_once("../vistas/contactanos.php");
}


?>

