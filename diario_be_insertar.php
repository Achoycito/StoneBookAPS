<?php

require_once 'userSession.php';
$sesion = new userSession();
require_once 'Conexion.php';
$instCon = new Conexion();

$idUsuario = $_SESSION["idUsuario"];

$cuerpo = "'" . $_POST["cuerpo"] . "'";
$emocion = $_POST["emocion"];

if ($emocion == 0){
    $emocion = "null";
}

$queryInsert = "insert into entradaDiario(idUsua, d_fecha, d_cuerpo, idEmoc) values
                                        ($idUsuario, now(), $cuerpo, $emocion);";


$instCon -> con -> query($queryInsert);
header("location:diario.php?accion=agregada");


?>