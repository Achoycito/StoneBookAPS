<?php


require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idHabi = $_GET["idHabi"];
$nombre = "'" . $_POST["nombreHabi"] . "'";
$tipo = $_POST["tipoHabi"];
if(empty($_POST["notas"])){
    $notas = "null";
}else{
    $notas = "'" . $_POST["notas"] . "'";
}

$queryUpdate = "update habito set
h_nombre = $nombre,
h_bueno = $tipo,
h_notas = $notas
where idHabi=$idHabi;";


$instCon -> con -> query($queryUpdate);
header("location:habitos.php?accion=actualizado");
?>