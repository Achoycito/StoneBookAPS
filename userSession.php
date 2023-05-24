<?php

    if(!isset($_SESSION["idUsuario"])){
        header("location:index.php");
    }
    
    class userSession{
        public function __construct(){
            session_start();
        }

        public function setCurrentUser( $p_idUsuario, $p_username ){
            $_SESSION["username"] = $p_username;
            $_SESSION["idUsuario"] = $p_idUsuario;
            $_SESSION["view"] = 1;
        }

        public function getCurrentUsername(  ) {
            return $_SESSION["username"];
        }
        public function getCurrentID(  ) {
            return $_SESSION["idUsuario"];
        }

        public function cerrarSesion(  ){
            session_unset();
            session_destroy();
            header("location:login.php");
        }
    }


?>