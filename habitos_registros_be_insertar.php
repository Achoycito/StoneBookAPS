<?php


require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idHabi = $_GET["idHabi"];

$fecha = "'" . $_POST["fecha"] . "'";
if(empty($_POST["notas"])){
    $notas = "null";
}else{
    $notas = "'" . $_POST["notas"] . "'";
}

$queryInsert = "insert into registroHabito(idHabi, hr_fecha, hr_notas) values
                                    ($idHabi, $fecha, $notas);";


$instCon -> con -> query($queryInsert);
header("location:habitos_registros.php?idHabi=$idHabi&accion=agregado");
?>