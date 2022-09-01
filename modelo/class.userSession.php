<?php

class userSession{
	//Crea la sesion
	//public function __construct(){
	//	session_start();
	//}

	//Setea la sesion del profesional
	public function setCurrentProfesional($user){
		$_SESSION['profesional']=$user;	
	}

	//Setea la sesion del cliente
	public function setCurrentCliente($user){
		$_SESSION['cliente']=$user;	
	}

	//Setea la sesion del administrador
	public function setCurrentAdm($user){
		$_SESSION['admin']=$user;
	}

	//Todos los elementos getter
	public function getCurrentProfesional(){
		return $_SESSION['profesional'];
	}

	public function getCurrentCliente(){
		return $_SESSION['cliente'];
	}

	public function getCurrentAdm(){
		return $_SESSION['admin'];
	}

	//Cierra la sesion
	public function closeSession(){
		session_unset();
		session_destroy();
	}
}
?>
