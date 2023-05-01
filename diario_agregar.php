<?php
  
  $pagActual = 50;
  require_once 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();

  $idUsuario = $_SESSION["idUsuario"];
  $emociones = $instCon->getListaEmociones();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agregar entrada de diario - StoneBook</title>
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

    <div class="pagetitle">
      <a href="diario.php"><i class="bi bi-arrow-left" title="Regresar" style="margin-right: 15px; font-weight: bold; font-size: 40px; color: #05a649" data-bs-toggle="tooltip" data-bs-placement="top"></i></a>
      <span>Agregar entrada de diario</span>
      <br>
      <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">


    <div class="card" style="background-color: #fff;">
        <div class="card-body">
            <br>
            <!-- Multi Columns Form -->
            
            <form class="row g-3" action="diario_be_insertar.php" method="post">      
              <div class="col-md-12">
                <label class="col-sm-12 col-form-label">Entrada</label>
                <textarea required name="cuerpo"  class="form-control" style="border-color: #05a649; height: 100px"></textarea>
              </div>
              <div class="col-md-12">
                <label class="form-label">Emoción</label>
                <select name="emocion" class="form-select">
                  <option value="0" selected>N/A</option>
                  <?php while($emocion = $emociones->fetch_assoc()) { ?>
                      <option value="<?php echo $emocion["idEmoc"]; ?>"><?php echo $emocion["em_nombre"] ?></option>
                  <?php } ?>
                </select>
              </div>
              <br><br><br><br><br>
                
                  
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary" style="margin-right:5px; background-color: #05A649; border-color: #05a649">
                  <i class="bi bi-plus-lg me-2"></i>Aceptar y agregar</button>
                <a href="diario.php"><button type="button" style="margin-left:5px;" class="btn btn-secondary">
                  <i class="bi bi-x-lg me-2"></i>Cancelar</button></a>
              </div>
            </form><!-- End Multi Columns Form -->
      </div>
    </div>
      
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