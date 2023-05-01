<?php

require_once 'Conexion.php';
$instCon = new Conexion();

$idEtiqueta = $_GET["idEtiq"];

$nombre = "'".$_POST["nombreEtiq"]."'";
$color = $_POST["color"];


$queryUpdate = "
update etiqueta set
e_nombre = $nombre, 
idColor = $color
where idEtiq = $idEtiqueta;
";


$instCon -> con -> query($queryUpdate);
header("location:etiquetas.php?accion=actualizada");
?>