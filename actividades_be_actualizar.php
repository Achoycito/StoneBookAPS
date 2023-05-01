<?php

require_once 'Conexion.php';
$instCon = new Conexion();
require_once 'userSession.php';
$sesion = new userSession();

$idActiActual = $_GET["idActi"];
$view = $_SESSION["view"];

$etiqueta = $_POST["etiquetas"];
$nombreActi = "'" . $_POST["nombreActi"] . "'";
$dificultad = $_POST["dificultad"];
$prioridad = $_POST["prioridad"];



if ($etiqueta == 0){
    $etiqueta="null";
}

if(empty($_POST["descripcion"])){
    $descripcion = "null";
}
else{
    $descripcion = "'" . $_POST["descripcion"] . "'";
}

if(empty($_POST["vencimiento"])){
    $vencimiento = "null";
}
else{
    $vencimiento = "'" . $_POST["vencimiento"] . "'";
}



$queryUpdate = "
update actividad set
idEtiq = $etiqueta, 
a_nombre = $nombreActi, 
a_descripcion = $descripcion, 
a_dificultad = $dificultad, 
a_prioridad = $prioridad, 
a_vencimiento = $vencimiento 
where idActi = $idActiActual;
";

$instCon -> con -> query($queryUpdate);
header("location:actividades.php?view=$view&accion=actualizada");
?>