<?php
session_start();
require_once('../modelo/class.doctor.php');

$newTit = $_POST['tit'];
$doc = new Doctor;

$doc->addTitulo($_SESSION['doctor'],$newTit);
?>