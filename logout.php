<?php

    include_once "userSession.php";

    $sesion = new userSession();

    $sesion->cerrarSesion();

    header("location:login.php");

?>