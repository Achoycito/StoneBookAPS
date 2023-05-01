<?php
  $pagActual = 50;

  require_once 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();

  $idUsuario = $_SESSION["idUsuario"];

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Diario - StoneBook</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Hola -->
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

  <?php include_once 'layout_header.php';?>

  <?php include_once 'layout_sidebar.php'?>




  <main id="main" class="main">

    <?php if(isset($_GET["accion"])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      Entrada de diario <?php echo $_GET["accion"] ?> correctamente
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <div class="pagetitle">
      <span>Diario</span>
      <a href="diario_agregar.php"><i class="bi bi-plus-lg" style="margin-left: 30px; font-weight: bold; font-size: 40px; color: #05a649" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar una entrada de diario"></i></a>
      <br>
      <br>
    </div><!-- End Page Title -->


    <section class="section dashboard">

      <?php
        $entradasDiario = $instCon->getListaEntradasDiario( $idUsuario );
        while($row = $entradasDiario->fetch_assoc()) {
      ?>
      <div class="card" style="background-color: #ffff; border: 2px solid black;">
        <div class="card-body">
            
            
            <p class="atributos" style="margin-top: 15px;">
                <?php echo $row["d_cuerpo"];?>
            </p>
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots" style="color: black;" data-bs-toggle="tooltip" data-bs-placement="top" title="Más opciones"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li><a class="dropdown-item" href="diario_editar.php?idEntrada=<?php echo $row["idEntrada"];?>"><i class="bi bi-pencil-square me-2"></i>Editar</a></li>
                <li><a class="dropdown-item" href="diario_be_eliminar.php?idEntrada=<?php echo $row["idEntrada"];?>"><i class="bi bi-x-lg me-2"></i>Eliminar</a></li>
              </ul>
            </div>
            
            <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fecha en que se agregó">
              <img class="img25" src="assets/imgs/fecha_venc.svg">
                <?php
                  if($row["d_fecha"] == null){
                    echo 'Sin fecha';
                  }
                  else{
                    echo $row["d_fecha"];
                  }
                ?>
            </span>
            
            <span class="badge text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Emoción">
              <img class="img25" src="assets/imgs/emot_<?php if($row["idEmoc"] == null ){echo 0;} else {echo $row["idEmoc"];}?>.svg">
                <?php if($row["idEmoc"] == null){
                    echo 'N/A';
                  }
                  else{
                    echo $instCon->getNombreEmocion( $row["idEmoc"] );
                  } 
                ?>
            </span>
        </div>
      </div><!-- End Default Card -->
      <?php } ?>


      <br><br><br><br><br>
      
      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once 'layout_footer.php'; ?>

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