<?php


require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idUsuario = $_SESSION["idUsuario"];
$nombre = "'" . $_POST["nombreHabi"] . "'";
$tipo = $_POST["tipoHabi"];
if(empty($_POST["notas"])){
    $notas = "null";
}else{
    $notas = "'" . $_POST["notas"] . "'";
}

$queryInsert = "insert into habito(idUsua, h_nombre, h_bueno, h_notas, h_fechaInicio) values
                                    ($idUsuario, $nombre, $tipo, $notas, now());";


$instCon -> con -> query($queryInsert);
header("location:habitos.php?accion=agregado");
?>