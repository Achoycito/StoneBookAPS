<?php
  
  $pagActual = 10;
  require_once 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();
  $view = $_SESSION["view"];

  $idUsuario = $_SESSION["idUsuario"];
  
  if(isset($_GET["view"])){
    $_SESSION["view"] = $_GET["view"];
    $view = $_SESSION["view"];
  }
  $etiquetasUsuario = $instCon -> getEtiquetasUsuario($idUsuario);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Actividades - StoneBook</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/imgs/icono.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php require_once 'layout_header.php'?>

  <?php require_once 'layout_sidebar.php'?>


  <main id="main" class="main">
    <?php if(isset($_GET["accion"])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      Actividad <?php echo $_GET["accion"] ?> correctamente
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <div class="pagetitle">
      
      <span>Actividades</span>
      <a href="actividades_agregar.php"><i class="bi bi-plus-lg" style="margin-left: 30px; font-weight: bold; font-size: 40px; color: #05a649" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar una actividad"></i></a>
      <!-- <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> With Text</button> -->
      <br>
      
      <select name="view" onchange="cambiarView(this)" class="col-md-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione el tipo de actividad desea ver" style="margin: 20px; border: 2px solid #05a649; border-radius:5px; font-size:18px; padding:2px;">
        <option value="1" <?php if($view==1) { echo "selected";} ?>>Pendientes</option>
        <option value="2" <?php if($view==2) { echo "selected";} ?>>Todas</option>
        <option value="3" <?php if($view==3) { echo "selected";} ?>>Completadas</option>
      </select>
      <br>
        
      
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <?php
        $actividades = $instCon -> getListaActividades($idUsuario);
        while($filota = $actividades->fetch_assoc()){
          
          $etiqueta = $instCon -> getEtiquetaYColor( $filota["idActi"] );
      ?>
  
      <!-- <div class="card" style="background-color: #<?php echo $etiqueta["c_hex"] ?>ca; border: 2px solid black;"> -->
      <!-- <div class="card" style="background: linear-gradient(225deg, #<?php echo $etiqueta["c_hex"] ?>, #f6f9ff 80%); border: 2px solid black;"> -->
      <div class="card" style="background-color: #<?php if($filota["a_estado"]) {echo "98ffc3";} else { echo "f1f6ff"; } ?>; border: 2px solid black;">
        <div class="card-body">
          




          <input id="chk<?php echo $filota["idActi"];?>" type="checkbox" <?php if($filota["a_estado"]) { echo "checked"; } ?> value="<?php echo $filota["idActi"]; ?>" onclick="completarCheckbox(this)" class="form-check-input chk-activ" data-bs-toggle="tooltip" data-bs-placement="top" title="Actividad completada">
          
          
          
          
          
          <span class="nombre" style="width:100%;">
            <?php echo $filota["a_nombre"]; ?>
          </span>
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots" style="color: black;" data-bs-toggle="tooltip" data-bs-placement="top" title="Más opciones"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              








              <?php if($filota["a_estado"]) { ?>
                <li data-chk="<?php echo $filota["idActi"];?>" onclick="clickearChk(this)" style="cursor: pointer;"><a class="dropdown-item"><i class="bi bi-square me-2"></i>Marcar como pendiente</a></li>
              <?php } else { ?>
                <li data-chk="<?php echo $filota["idActi"];?>" onclick="clickearChk(this)" style="cursor: pointer;"><a class="dropdown-item"><i class="bi bi-check-square-fill me-2"></i>Marcar como completada</a></li>
              <?php } ?>













              <li><a class="dropdown-item" href="actividades_editar.php?idActi=<?php echo $filota["idActi"];?>"><i class="bi bi-pencil-square me-2"></i>Editar</a></li>
              <li><a class="dropdown-item" href="actividades_be_eliminar.php?idActi=<?php echo $filota["idActi"];?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
            </ul>
          </div><br>
          
          <p class="atributos">
            <?php 
                if($filota["a_descripcion"] == null){
                  echo 'Sin descripcion';
                }
                else{
                  echo $filota["a_descripcion"];
                }
              ?>
          </p>
    

          <span class="badge text-dark" style="background-color: #<?php echo $etiqueta["c_hex"] ?>;"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Etiqueta">
            <img class="img25" src="assets/imgs/tag.svg">
            <?php echo $etiqueta["e_nombre"] ?>
          </span>
          
          <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fecha de vencimiento">
            <img class="img25" src="assets/imgs/fecha_venc.svg">
            <?php 
              if($filota["a_vencimiento"] == null){
                echo 'Sin fecha';
              }
              else{
                echo $filota["a_vencimiento"];
              }
            ?>
          </span>
          
    
          <?php
            $prioridad = $instCon->getPrioridad( $filota["a_prioridad"] );
          ?>
          <span class="badge text-dark" style="background-color: <?php echo $prioridad["color"]; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Prioridad">
            <img class="img25" src="assets/imgs/prioridad.svg">
            <?php echo $prioridad["nombre"]; ?>
          </span>

          <?php
            $dificultad = $instCon->getDificultad( $filota["a_dificultad"] );
          ?>
          <span class="badge text-dark" style="background-color: <?php echo $dificultad["color"]; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dificultad">
          <img class="img25" src="assets/imgs/dificultad.svg">
            <?php echo $dificultad["nombre"]; ?>
          </span>
    
          
        </div>
      </div><!-- End Default Card -->
      <?php } ?>
      
      <br><br><br><br>


      
    </section>

  </main><!-- End #main -->

  <?php include_once 'layout_footer.php' ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script>
    function completarCheckbox(cb) {
      window.location.href="actividades_be_completar.php?idActi=" + cb.value + "&estado=" + cb.checked;
    }
    function clickearChk(li) {
      let idChk = li.getAttribute("data-chk");
      cb = document.getElementById("chk" + idChk);
      cb.click();
    }

    function cambiarView(select){
      window.location.href="actividades.php?view=" + select.value;
      // console.log("Ahora mostrar view "+select.value);
    }

  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>