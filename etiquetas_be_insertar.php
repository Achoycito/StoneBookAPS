<?php


require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idUsuario = $_SESSION["idUsuario"];
$nombre = "'".$_POST["nombreEtiq"]."'";
$color = $_POST["color"];


$queryInsert = "insert into etiqueta(idUsua, e_nombre, idColor) values($idUsuario, $nombre, $color);";


$instCon -> con -> query($queryInsert);
header("location:etiquetas.php?accion=agregada");
?>