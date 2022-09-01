<?php

class User{

	private $correo;
	private $nombre;
	private $apellido;
	private $fechaNac;
	private $id;

	public function userExt($user, $pass){
		$md5pass = md5($pass);
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql = ('select * from profesional where correo = :correo and contrasena = :pass');		
		$stm = $conexion->prepare($sql);
		$stm->bindParam(':correo',$user);
		$stm->bindParam(':pass',$md5pass);	
		if(!$stm){
			return 'Error al iniciar la sesion';
		}else{
			$stm->execute();
			if($stm->rowCount()){
				return true;
			}else{
				return false;
			}

		}
	}
	
	public function setUser($user){
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql = 'select * from profesional where correo = :correo';
		$stm = $conexion->prepare($sql);
		$stm->bindParam(':correo',$user);
		if(!$stm){
			return 'Error al ejecutar el comando';
		}else{
			$stm->execute();
			foreach ($stm as $currentUser){
				$this->id =$currentUser['id'];
				$this->correo = $currentUser['correo'];	
				$this->nombre = $currentUser['nombre'];	
				$this->apellido = $currentUser['apellido'];
				$this->fechaNac = $currentUser['fecha_nac'];
			}
		}
	}

	/*public function setUser($user){
		$query = $this->get_conexion()->prepare('select * from profesional where correo = :correo');
		$query->execute(['correo' => $user]);

		foreach ($query as $currentUser){
		$this->correo = $currentUser['correo'];	
		$this->nombre = $currentUser['nombre'];	
		$this->apellido = $currentUser['apellido'];
		$this->fechaNac = $currentUser['fecha_nac'];
		}*/

	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function getFechaNac(){
		return $this->fechaNac;
	}
	
} 

?>
