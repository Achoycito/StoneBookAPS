<?php
  
  $pagActual = 30;
  require_once 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();

  $idUsuario = $_SESSION["idUsuario"];

  $listaHabitos = $instCon -> getHabitos($idUsuario);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hábitos - StoneBook</title>
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
      Hábito <?php echo $_GET["accion"] ?> correctamente
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <div class="pagetitle">
      
      <span>Hábitos</span>
      <a href="habitos_agregar.php"><i class="bi bi-plus-lg" style="margin-left: 30px; font-weight: bold; font-size: 40px; color: #05a649" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar un hábito"></i></a>
      <br>
      <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <?php while($row = $listaHabitos->fetch_assoc()){
          $datos = $instCon->getUltimoRegistro($row["idHabi"]);
          $instCon->cerrar();
          $instCon = new Conexion();

          if($row["h_bueno"] == '0'){
            $buenomalo = "Mal hábito";
            $colorbg = "ff9191";
          }
          else{
            $buenomalo = "Buen hábito";
            $colorbg = "9affaf";
          }
      ?>
  
      <div class="card" style="background-color: #<?php echo $colorbg ?>; border: 2px solid black;">
        <div class="card-body">
          
          <span class="nombre" style="width:100%;">
            <?php echo $row["h_nombre"]; ?>
            <a href="habitos_registros_agregar.php?idHabi=<?php echo $row["idHabi"] ?>"><i class="bi bi-plus" style="margin-left: 15px; font-weight: bold; font-size: 27px; color: #000" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar un registro al hábito"></i></a>
          </span>
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots" style="color: black;" data-bs-toggle="tooltip" data-bs-placement="top" title="Más opciones"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li><a class="dropdown-item" href="habitos_registros.php?idHabi=<?php echo $row["idHabi"];?>"><i class="bi bi-list-ul me-2"></i>Ver registros del hábito</a></li>
              <li><a class="dropdown-item" href="habitos_editar.php?idHabi=<?php echo $row["idHabi"];?>"><i class="bi bi-pencil-square me-2"></i>Editar</a></li>
              <li><a class="dropdown-item" href="habitos_be_eliminar.php?idHabi=<?php echo $row["idHabi"];?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
            </ul>
          </div><br>

          <p class="atributos">
            <?php 
                if($row["h_notas"] == null){
                  echo 'Sin notas';
                }
                else{
                  echo $row["h_notas"];
                }
              ?>
          </p>
          
          <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tipo de hábito">
            <img class="img25" src="assets/imgs/buenomalo.svg">
            <?php echo $buenomalo; ?>
          </span>

          <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tiempo desde última vez">
            <img class="img25" src="assets/imgs/tiempo.svg">
            <?php echo $datos["tiempo"]; ?>
          </span>

          <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fecha y hora de última vez">
            <img class="img25" src="assets/imgs/ultima_fecha.svg">
            <?php echo $datos["ultimaVez"]; ?>
          </span>

          <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fecha en que se agregó">
            <img class="img25" src="assets/imgs/fecha_inicio.svg">
            <?php echo $row["h_fechaInicio"]; ?>
          </span>
        </div>
      </div><!-- End Default Card -->
      <?php } ?>








      <br><br><br><br>


      











      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>