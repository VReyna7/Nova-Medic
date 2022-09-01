<?php
class Expediente{
    private $id;
    private $peso;
    private $altura;
    private $sangre;
    private $alergia;
    private $alerMedi;
    private $psico;
    private $id_cliente;
    private $text_anima;
    private $text_medicina;

    //veirfica que los datos no esten vacios
    public function veriData($peso,$altura,$sangre,$alergia,$alerMedi,$psico, $text_anima, $text_medicina){
        if(!empty($peso) && !empty($altura) && !empty($sangre) && !empty($alergia) && !empty($alerMedi) && !empty($psico)){
            $this->peso= $peso;
            $this->altura = $altura;
            $this->sangre = $sangre;
            $this->alergia = $alergia;
            $this->alerMedi= $alerMedi;
            $this->psico = $psico;
            $this->text_anima = $text_anima;
            $this->text_medicina = $text_medicina;
    
        }else{
            throw new Exception('Error, Tiene que rellenar todos los datos');
        }
    }

    //crear historial
    public function newExpediente(){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into expediente (peso, estatura, sangre, alergia, psico, alerMedi, id_cliente, text_anima, text_medicina) values (:peso, :estatura, :sangre, :alergia, :psico, :alerMedi, 
        :id_cliente, :text_anima,:text_medicina)";
        $stmt = $conexion->prepare($sql) ;
        $stmt->bindParam(":peso",$this->peso);
        $stmt->bindParam(":estatura",$this->altura);
        $stmt->bindParam(":sangre",$this->sangre);
        $stmt->bindParam(":alergia",$this->alergia);
        $stmt->bindParam(":psico",$this->psico);
        $stmt->bindParam(":alerMedi",$this->alerMedi);
        $stmt->bindParam(":id_cliente",$_SESSION['cliente']);
        $stmt->bindParam(":text_anima",$this->text_anima);
        $stmt->bindParam(":text_medicina",$this->text_medicina);
        if(!$stmt){
            throw new Exception("Error. No se pudo conectar con la base de datos");
        }else{
            $stmt->execute();
            //Se a registrado correctamente
        }
    }

    public function setExp(){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from expediente where id_cliente=:id_cliente';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id_cliente",$_SESSION['cliente']);
        if(!$stmt){
            throw new Exception("Error. Hubo un fallo en la base de datos");
        }else{
            $stmt->execute();
            $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $datauser['id'];
            $this->peso = $datauser['peso'];
            $this->altura = $datauser['estatura'];
            $this->sangre = $datauser['sangre'];
            $this->alergia= $datauser['alergia'];
            $this->alerMedi= $datauser['alerMedi'];
            $this->psico= $datauser['psico'];
            $this->text_anima = $datauser['text_anima'];
            $this->text_medicina = $datauser['text_medicina'];
        }
    }

    //Actualizar id_Experiente en el cliente
    public function updateId(){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "update cliente set id_historial=:id_historial where id=:id_cliente";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id_historial",$this->id);
        $stmt->bindParam(":id_cliente",$_SESSION['cliente']);
        $stmt->execute();
    }

    //funciones get
    public function getPeso(){
        return $this->peso;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function getSangre(){
        return $this->sangre;
    }

    public function getAlergia(){
        return $this->alergia;
    }

    public function getMedicina(){
        return $this->alerMedi;
    }

    public function getPsico(){
        return $this->psico;
    }

    public function getText_anima(){
        return $this->text_anima;
    }

    public function getText_medicina(){
        return $this->text_medicina;
    }
    
}
?>