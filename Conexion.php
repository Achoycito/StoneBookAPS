<?php
    class Conexion{
        public $con;

        public function __construct(){
            $this->con = new mysqli("localhost", "root", "", "stonebook");
        }

        public function usuarioYaExiste( $username ) {
            $result = $this->con->query("select idUsua from usuario where u_username = '$username';");
            $idUsua = null;

            foreach($result as $resultado){
                $idUsua = $resultado["idUsua"]; //Hace la consulta y agarra el entero IDUsua
            }
            return $idUsua;
        }
        public function getIDUsuario( $username, $password ) {
            $result = $this->con->query("select idUsua from usuario where u_username = '$username' and u_contrasenia = '$password';");
            
            $idUsua = null;

            foreach($result as $resultado){
                $idUsua = $resultado["idUsua"]; //Hace la consulta y agarra el entero IDUsua
            }
            return $idUsua;
        }
        public function registrarUsuario($p_username, $p_password){
            $result = $this->con->query("call registrarUsuarioGetID('$p_username', '$p_password')");
            $idUsua = null;
            foreach($result as $resultado){
                $idUsua = $resultado["idUsua"]; //Hace la consulta y agarra el entero IDUsua
            }
            return $idUsua;
        }





        public function datosDashboard( $idUsuario ){
            $result = $this->con->query("call datosDashboard($idUsuario);");
            return $result;
        }
        public function getFrecuenciaEmocion( $idUsuario){
            $result = $this->con->query("call frecuenciaEmociones($idUsuario);");
            return $result;
        }








        public function getHabitos( $idUsuario ){
            $result = $this->con->query("select * from habito where idUsua = $idUsuario order by h_nombre;");
            return $result;
        }
        public function getUltimoRegistro( $idHabi ){
            $tiempoUltimaVez = "N/A";
            $tiempo = null;
            
            $resUltFecha = $this->con->query("select max(hr_fecha) as ultimaFecha from registroHabito where idHabi=$idHabi;");
            while ($row = $resUltFecha->fetch_assoc()) {
                $ultimaVez = $row["ultimaFecha"];
            }
            if($ultimaVez == null){
                $ultimaVez = "N/A";
            }
            else{
                $resTiempo = $this->con->query("call getDiferenciaDeFechas ('$ultimaVez', now());");
                while ($row = $resTiempo->fetch_assoc()) {
                    $tiempo = $row["total"];
                }
            }
            if($tiempo == null){
                $tiempo = "N/A";
            }
            $datos = [
                "ultimaVez" => $ultimaVez,
                "tiempo" => $tiempo
            ];
            return $datos;
        }
        public function getDatosHabito ( $idHabi ){
            $result = $this->con->query("select * from habito where idHabi = $idHabi;");
            return $result;
        }
        public function getDatosRegistro ( $idRegH ){
            $result = $this->con->query("select * from registroHabito where idRegH = $idRegH;");
            return $result;
        }

        public function getRegistrosHabi($idHabi){
            $result = $this->con->query("select * from registroHabito where idHabi = $idHabi order by hr_fecha desc");
            return $result;
        }


        public function formatoDatetimeFecha($fecha){
            $result = $this->con->query("call formatoHTMLDatetime('$fecha');");
            return $result;
        }
        
        public function getListaActividades( $idUsuario){
            switch ($_SESSION["view"]) {
                case 1:
                    $query = "select * from actividad where idUsua = $idUsuario and a_estado=false order by a_prioridad desc, -a_vencimiento desc;";
                    break;
                case 2:
                    $query = "select * from actividad where idUsua = $idUsuario order by a_prioridad desc, -a_vencimiento desc;";
                    break;
                case 3:
                    $query = "select * from actividad where idUsua = $idUsuario and a_estado=true order by a_prioridad desc, -a_vencimiento desc;";
                    break;
                default:
                    break;
            }
            $result = $this->con->query($query);
            
            return $result;
        }
        public function getDatosActividad ( $idActividad ){
            $result = $this->con->query("select * from actividad where idActi = $idActividad;");
            return $result;
        }
        public function getFechaHoraActividad( $idActividad ){
            $result = $this->con->query("select DATE_FORMAT(a_vencimiento, '%Y-%m-%d') a_fecha, DATE_FORMAT(a_vencimiento,'%H:%i:%s')  a_hora FROM actividad where idActi = $idActividad;");
            return $result;
        }



        public function getEtiquetasUsuario( $idUsuario){
            $result = $this->con->query("select * from etiqueta natural join coloresEtiquetas where idUsua = $idUsuario;");
            return $result;
        }
        public function getEtiquetaYColor( $idActividad ) {
            $nombreEtiq = null;
            $idEtiq = null;
            $resEtiq = $this->con->query("select * from etiqueta where idEtiq = (select idEtiq from actividad where idActi = $idActividad);");
            foreach($resEtiq as $resultado){
                $nombreEtiq = $resultado["e_nombre"];
                $idEtiq = $resultado["idEtiq"];
            }
            if($idEtiq == null){
                $hexColor = "dcdae9";
                $nombreEtiq = "Ninguna";
            }else{
                $resColor = $this->con->query("select c_hex from coloresEtiquetas where idColor = (select idColor from etiqueta where idEtiq = $idEtiq);");
                foreach($resColor as $resultado){
                    $hexColor = $resultado["c_hex"];
                }
            }
            $datosEtiqueta = [
                "idEtiq" => $idEtiq,
                "e_nombre" => $nombreEtiq,
                "c_hex" => $hexColor
            ];

            return $datosEtiqueta;
        }
        public function getDatosEtiqueta( $idEtiq ){
            $result = $this->con->query("select * from etiqueta natural join coloresEtiquetas where idEtiq = $idEtiq;");
            return $result;
        }
        public function getColoresEtiquetas(){
            $result = $this->con->query("select * from coloresEtiquetas;");
            return $result;
        }



        public function getListaEmociones(){
            $result = $this->con->query("select * from emociones;");
            return $result;
        }
        public function getListaEntradasDiario( $idUsuario){
            $result = $this->con->query("select * from entradaDiario where idUsua = $idUsuario order by d_fecha desc;");
            return $result;
        }
        public function getDatosEntradaDiario( $idEntrada ){
            $result = $this->con->query("select * from entradaDiario where idEntrada = $idEntrada;");
            return $result;
        }

        public function getNombreEmocion( $idEmocion ){
            $nombreEmocion = "N/A";
            $result = $this->con->query("select em_nombre from emociones where idEmoc = $idEmocion;");
            foreach($result as $resultado){
                $nombreEmocion = $resultado["em_nombre"];
            }
            return $nombreEmocion;
        }




        public function getDificultad( $numDificultad ) {
            $dificultad = null;
            $color = null;

            switch ($numDificultad) {
                case 0:
                    $dificultad = "N/A";
                    $color = "transparent";
                    break;
                case 1:
                    $dificultad = "Baja";
                    $color = "#61c154";
                    break;
                case 2:
                    $dificultad = "Media";
                    $color = "#ffff66";
                    break;
                case 3:
                    $dificultad = "Alta";
                    $color = "#ff6666";
                    break;
                default:
                    $dificultad = "N/A";
                    $color = "transparent";
                    break;
            }
            $datosDificultad = [
                "nombre" => $dificultad,
                "color" => $color
            ];
            return $datosDificultad;
        }

        public function getPrioridad( $numPrioridad ) {
            $prioridad = null;
            $color = null;

            switch ($numPrioridad) {
                case 0:
                    $prioridad = "N/A";
                    $color = "transparent";
                    break;
                case 1:
                    $prioridad = "Baja";
                    $color = "#61c154";
                    break;
                case 2:
                    $prioridad = "Media";
                    $color = "#ffff66";
                    break;
                case 3:
                    $prioridad = "Alta";
                    $color = "#ff944d";
                    break;
                case 4:
                    $prioridad = "Muy alta";
                    $color = "#ff6666";
                    break;
                default:
                    $prioridad = "N/A";
                    $color = "transparent";
                    break;
            }
            $datosPrioridad = [
                "nombre" => $prioridad,
                "color" => $color
            ];
            return $datosPrioridad;
        }


        public function cerrar(){
            $this->con->close();
        }
    }















































































?>