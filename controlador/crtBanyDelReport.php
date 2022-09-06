<?php

   $destino = "fm920715@gmail.com";
   $nombre = "Francisco Mendoza" ;
   $correo = "talentsystem2022@gmail.com";
   $mensaje = "Buenas tardes";
   $contenido = " Nombre : " .$nombre . " \ nCorreo : ". $correo ." \ nMensaje : " .$mensaje ;
   mail ( $destino , " Contacto " , $contenido );
   header("Location : index.php");

?>