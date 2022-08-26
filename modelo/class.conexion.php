<?php
class Conexion{
	//Estos datos se cambian al momento de meterlo a un hosting
	public function get_conexion(){
		$user = 'u655795966_root';
		$pass = 'NovaMedic2022';
		$host = "localhost";
		$db = 'u655795966_nova_medic';
		try{
			$dsn = "mysql:host=$host;dbname=$db;";
			$dbh = new PDO($dsn, $user, $pass);
			return $dbh;
		}catch (PDOException $e){
			echo "Error en la base de datos" . $e->getMessage();	
		}
	}
}
?>
