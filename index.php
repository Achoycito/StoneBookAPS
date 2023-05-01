<?php
require_once "Conexion.php";
$instCon = new Conexion();
require_once "userSession.php";
$sesion = new userSession();


if(isset($_SESSION["username"])){
    // echo "Ya esta iniciada una sesion";
    $view = $_SESSION["view"];
    header ("location:actividades.php?view=$view");
}
//Se acaba de enviar el formulario y valida si existe el usuario
else if (isset($_POST["username"]) && isset($_POST["password"])){
    $idUsuario = $instCon -> getIDUsuario($_POST["username"], $_POST["password"]);
    if(isset($idUsuario)){ //Si idUsuario esta set significa que encontro al usuario y lo va a poner en la sesion
        $sesion->setCurrentUser($idUsuario, $_POST["username"]);
        header("location: actividades.php?view=1"); //Esta debería ser 1


    }else{ //Si no, pues da error y se muestra en la de login
        $mensajeError = "Nombre de usuario y/o contraseña incorrectos";
        include 'login.php';
    }
}
else{ //Si no hay sesion y no se envio formulario, manda al login
    header ("location:login.php");
}
?>