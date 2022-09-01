<?php
session_start();
?>
<?php
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.admin.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.doctor.php");

$clt = new Cliente;
$doc = new Doctor;
$admin = new Admin;

$name = basename($_FILES['foto']['name']);
$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
$tmp = $_FILES['foto']['tmp_name'];
$dir = 'C:/xampp/htdocs/Nova-Medic-main/uploads/';

try {
  //Subida para el cliente
  if (isset($_SESSION['cliente'])) {
    $id = $_SESSION['cliente'];
    mkdir('../uploads/cliente/' . $id);
    $route = "../uploads/cliente/" . $id . "/" . $name;
    //$clt->veriFoto($name, $ext);
    $clt->actuFoto($route, $id);
    move_uploaded_file($_FILES['foto']['tmp_name'], $dir . "cliente/" . $id . "/" . $name);
    header("location: ../vistas/perfil.php");
    //Subida para el administrador
  } else if ($_SESSION['admin']) {
    $id = $_SESSION['admin'];
    mkdir('../uploads/admin/' . $id);
    $route = "../uploads/admin/" . $id . "/" . $name;
    $admin->actuFoto($route, $id);
    move_uploaded_file($_FILES['foto']['tmp_name'], $dir . "admin/" . $id . "/" . $name);
    header("location: ../vistas/perfil.php");
    //Subida para el doctor
  } else if ($_SESSION['doctor']) {
    $id = $_SESSION['doctor'];
    mkdir('../uploads/doctor/' . $id);
    $route = "../uploads/doctor/" . $id . "/" . $name;
    $doc->actuFoto($route,  $id);
    move_uploaded_file($_FILES['foto']['tmp_name'], $dir . "doctor/" . $id . "/" . $name);
    header("location: ../vistas/perfil.php");
  } else {
    header("location: ../index.html");
  }
} catch (Exception $e) {
  $error = $e->getMessage();
}

?>