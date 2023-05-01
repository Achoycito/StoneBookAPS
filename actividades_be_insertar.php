<?php

require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idUsuario = $_SESSION["idUsuario"];
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

$queryInsert= "insert into actividad (idUsua, idEtiq, a_estado, a_nombre, a_descripcion, a_dificultad, a_prioridad, a_agregada, a_vencimiento) values (
                                $idUsuario, $etiqueta, false, $nombreActi, $descripcion, $dificultad, $prioridad, now(), $vencimiento);";


$instCon -> con -> query($queryInsert);
header("location:actividades.php?view=$view&accion=agregada");

?>