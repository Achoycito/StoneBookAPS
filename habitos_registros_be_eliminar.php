<?php

require_once 'Conexion.php';
$instCon = new Conexion();

$idHabi = $_GET["idHabi"];
$idRegH = $_GET["idRegH"];

$queryDeleteRegistro = "delete from registroHabito where idRegH=$idRegH;";

$instCon -> con -> query($queryDeleteRegistro);
header("location:habitos_registros.php?idHabi=$idHabi&accion=eliminado");
?>