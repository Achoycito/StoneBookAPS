<?php

require_once 'Conexion.php';
$instCon = new Conexion();

$idEtiqActual = $_GET["idEtiq"];

$queryDelete = "
delete from etiqueta
where idEtiq = $idEtiqActual;
";


$instCon -> con -> query($queryDelete);
header("location:etiquetas.php?accion=eliminada");

?>