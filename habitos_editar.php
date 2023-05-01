<?php
  
  $pagActual = 30;
  require_once 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();

  $idUsuario = $_SESSION["idUsuario"];

  $idHabiActual = $_GET["idHabi"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar hábito - StoneBook</title>
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
      <a href="habitos.php"><i class="bi bi-arrow-left" title="Regresar" style="margin-right: 15px; font-weight: bold; font-size: 40px; color: #05a649" data-bs-toggle="tooltip" data-bs-placement="top"></i></a>
      <span>Editar hábito</span>
      <br>
      <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">


    <div class="card" style="background-color: #fff;">
        <div class="card-body">
            <br>

            <?php
                $datosHabiActual = $instCon->getDatosHabito( $idHabiActual );
                $habiActual = $datosHabiActual->fetch_assoc();
            ?>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="habitos_be_actualizar.php?idHabi=<?php echo $idHabiActual; ?>" method="post">
                    <div class="col-md-8">
                        <label class="form-label">Nombre de hábito</label>
                        <input required name="nombreHabi" value="<?php echo $habiActual["h_nombre"]; ?>" type="text" autocomplete="off" maxlength="100" class="form-control" style="border-color: #05a649">
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipo de hábito</label>
                        <select required name="tipoHabi" class="form-select" style="border-color: #05a649">
                            <option value="true" <?php if($habiActual["h_bueno"] == '1') { echo "selected";} ?>>Buen hábito</option>
                            <option value="false" <?php if($habiActual["h_bueno"] == '0') { echo "selected";} ?>>Mal hábito</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-2 col-form-label">Notas</label>
                        <textarea name="notas" class="form-control" maxlength="500" style="height: 100px"><?php echo $habiActual["h_notas"];?></textarea>
                    </div>
                    <br><br><br><br><br>
                  
                    
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" style="margin-right:5px; background-color: #05A649; border-color: #05a649">
                        <i class="bi bi-pencil-square me-2"></i>Aceptar y editar</button>
                        <a href="habitos.php"><button type="button" style="margin-left:5px;" class="btn btn-secondary">
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