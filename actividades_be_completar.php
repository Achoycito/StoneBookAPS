<?php

require_once 'Conexion.php';
$instCon = new Conexion();
require_once "userSession.php";
$sesion = new userSession();

$idActiActual = $_GET["idActi"];
$estado = $_GET["estado"];
$view = $_SESSION["view"];
$accion = null;

if($estado == "true"){
    $timeCompletada = "now()";
    $accion = "completada";
}
else{
    $timeCompletada = "null";
    $accion = "cambiada a pendiente";
}

$queryComplete = "
update actividad
set a_estado = $estado,
a_completada = $timeCompletada
where idActi = $idActiActual;
";


$instCon -> con -> query($queryComplete);
header("location:actividades.php?view=$view&accion=$accion");

?>