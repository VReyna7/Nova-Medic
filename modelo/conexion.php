<?php
class conexion{
	public function get_conexion(){
		$user = 'root';
		$pass = '';
		$host = 'localhost';
		$db = '';
		try{
			$dsn = "mysql:host=$host;dbname:$db;";
			$dbh = new PDO($dsn, $user, $pass);
			return $dbh;
		}catch (PDOException $e){
			echo "Error en la base de datos" . $e->getMessage();	
		}
	}
}
?>
