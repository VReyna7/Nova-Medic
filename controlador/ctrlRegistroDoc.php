<?php
session_start();
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.sesion.php');

$doc = new Doctor();
$sesion = new Sesion();

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellido = isset($_POST['ape']) ? $_POST['ape'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";
$mail = isset($_POST['mail']) ? $_POST['mail'] : "";
$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
$fech = isset($_POST['fecha']) ? $_POST['fecha'] : "";
$espec = isset($_POST['espec']) ? $_POST['espec'] : "";
$subjet = "Tus Creendiales, ¡Bienvenido nuevo doctor!";
 $mensaje= "correo: ".$mail." "."contra:"." ".$pass;
$headers = "From: Nova-Medic". "\r\n" . $mail;;
try {
    $doc->veriData($nombre, $apellido, $pass, $mail, $sex, $fech, $espec);
    if (!$doc->extDoctor($mail)) {
        $doc->newDoctor();
        mail($mail,$subjet,$mensaje,$headers);
        $doc->sesionDoctor($mail);
        $sesion->setDoctorActual($doc->getId());
        header("location: ../vistas/creacionCuentas.php");
    } else {
        $error = "Error. Este correo ya esta en uso";
        header("location: ../vistas/registroDoctores.php");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header("location: ../vistas/registroDoctores.php");
}
?>
