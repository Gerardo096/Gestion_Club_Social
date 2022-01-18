<?php
$servidor = "localhost";
$baseDatos = "clubsocial";
$usuario = "root";
$pass = "root";


$titular= $_POST["titular"];
$contenido=$_POST["contenido"];
$fecha=date("d-m-Y H:i");

insertarNoticia($titular, $contenido, $fecha);


function insertarNoticia($titular, $contenido, $fecha)
{
    
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("INSERT into noticias values(null,:titular,:content,:fecha)");
        $sql->bindParam(":titular", $titular);
        $sql->bindParam(":content", $contenido);
        $sql->bindParam(":fecha", $fecha);
        $sql->execute();
        
        
        
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    
    
}




?>