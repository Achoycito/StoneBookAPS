<?php
require_once "Conexion.php";
$instCon = new Conexion();
require_once "userSession.php";
$sesion = new userSession();

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["passwordconfirm"])){
    
    $idUsuario = $instCon -> usuarioYaExiste($_POST["username"]);
    //Si idUsuario esta set significa que encontro al usuario y no se puede registrar
    if(isset($idUsuario)){
        $mensajeError = "Este usuario ya existe";
        include 'registrar.php';
    //Si no existe, registra al usuario
    }else if ($_POST["password"] == $_POST["passwordconfirm"]) {
        $idUsuario = $instCon->registrarUsuario($_POST["username"], $_POST["password"]);

        if(isset($idUsuario)){
            $sesion->setCurrentUser($idUsuario, $_POST["username"]);
            header("location:index.php");
        }
    }
    else{
        $mensajeError = "Las contraseñas introducidas no coinciden";
        include 'registrar.php';
    }
}
else{
    header ("location:login.php");
}
?>