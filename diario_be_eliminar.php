<?php

require_once 'Conexion.php';
$instCon = new Conexion();

$idEntradaActual = $_GET["idEntrada"];

$queryDelete = "
delete from entradaDiario
where idEntrada = $idEntradaActual;
";


$instCon -> con -> query($queryDelete);
header("location:diario.php?accion=eliminada");
?>