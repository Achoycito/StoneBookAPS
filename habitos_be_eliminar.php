<?php

require_once 'Conexion.php';
$instCon = new Conexion();

$idHabi = $_GET["idHabi"];

$queryDeleteHabito = "
delete from habito
where idHabi = $idHabi;";

$queryDeleteRegistros = "delete from registroHabito where idHabi=$idHabi";

$instCon -> con -> query($queryDeleteRegistros);
$instCon -> con -> query($queryDeleteHabito);
header("location:habitos.php?accion=eliminado");
?>