<?php


require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idHabi = $_GET["idHabi"];
$idRegH = $_GET["idRegH"];
$fecha = "'" . $_POST["fecha"] . "'";
if(empty($_POST["notas"])){
    $notas = "null";
}else{
    $notas = "'" . $_POST["notas"] . "'";
}

$queryUpdate = "update registroHabito set
hr_fecha = $fecha,
hr_notas = $notas
where idRegH=$idRegH;";


$instCon -> con -> query($queryUpdate);
header("location:habitos_registros.php?idHabi=$idHabi&accion=actualizado");
?>