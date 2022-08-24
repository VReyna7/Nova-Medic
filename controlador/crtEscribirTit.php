<?php
session_start();
require_once('../modelo/class.doctor.php');

$doc = new Doctor;

$info = $doc->verTitulos($_SESSION['doctor']);

include_once '../';
?>