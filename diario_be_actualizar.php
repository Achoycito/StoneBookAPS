<?php

require_once 'Conexion.php';
$instCon = new Conexion();

$idEntradaActual = $_GET["idEntrada"];

$cuerpo = "'" . $_POST["cuerpo"]."'";

if($_POST["emocion"] == 0){
    $emocion = "null";
}
else{
    $emocion = $_POST["emocion"];
}

$queryUpdate = "
update entradaDiario set
d_cuerpo = $cuerpo, 
idEmoc = $emocion
where idEntrada = $idEntradaActual;
";


$instCon -> con -> query($queryUpdate);
header("location:diario.php?accion=actualizada");
?>