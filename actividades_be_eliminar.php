<?php

require_once 'Conexion.php';
$instCon = new Conexion();
require_once 'userSession.php';
$sesion = new userSession();

$idActiActual = $_GET["idActi"];
$view = $_SESSION["view"];

$queryDelete = "
delete from actividad
where idActi = $idActiActual;
";


$instCon -> con -> query($queryDelete);
header("location:actividades.php?view=$view&accion=eliminada");
?>