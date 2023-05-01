<?php
  
  $pagActual = 10;
  require_once 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();

  $idUsuario = $_SESSION["idUsuario"];
  $view = $_SESSION["view"];
  $etiquetasUsuario = $instCon -> getEtiquetasUsuario($idUsuario);

  $idActiActual = $_GET["idActi"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar actividad - StoneBook</title>
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
      <a href="actividades.php?view=<?php echo $view ?>"><i class="bi bi-arrow-left" title="Regresar" style="margin-right: 15px; font-weight: bold; font-size: 40px; color: #05a649" data-bs-toggle="tooltip" data-bs-placement="top"></i></a>
      <span>Editar actividad</span>
      <br>
      <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">


    <div class="card" style="background-color: #fff;">
        <div class="card-body">
            <br>
            <!-- Multi Columns Form -->
            <?php
              $datosActiActual = $instCon -> getDatosActividad($idActiActual);
            ?>
            <form class="row g-3" action="actividades_be_actualizar.php?idActi=<?php echo $idActiActual; ?>" method="post">
                    <?php $actiActual = $datosActiActual->fetch_assoc(); ?>
                    <div class="col-md-12">
                        <label class="form-label">Nombre de actividad</label>
                        <input required name="nombreActi" value="<?php echo $actiActual["a_nombre"] ?>" type="text" autocomplete="off" maxlength="100" class="form-control" style="border-color: #05a649">
                        <br>
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-2 col-form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" maxlength="500" style="height: 100px"><?php echo $actiActual["a_descripcion"] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Etiquetas</label> 
                        <select name="etiquetas" value="<?php echo $actiActual["idEtiq"] ?>" class="form-select" style="background-color: #fff">
                            <option value="0">N/A</option>

                            <?php while($row = $etiquetasUsuario->fetch_assoc()){ ?>
                                <option <?php if($actiActual["idEtiq"] == $row["idEtiq"]){echo "selected";} ?> value="<?php echo $row["idEtiq"]?>"><?php echo $row["e_nombre"] ?> </option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fecha de vencimiento</label>
                        <input name="vencimiento" value="<?php echo str_replace(" ", "T", $actiActual["a_vencimiento"]); ?>" type="datetime-local" min="2000-01-01T00:00" max="9999-12-31T23:59" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prioridad</label>
                        <select name="prioridad" class="form-select">
                            <option value="0" <?php if($actiActual["a_prioridad"] == 0){echo "selected";} ?>>N/A</option>
                            <option value="1" <?php if($actiActual["a_prioridad"] == 1){echo "selected";} ?>>Baja</option>
                            <option value="2" <?php if($actiActual["a_prioridad"] == 2){echo "selected";} ?>>Media</option>
                            <option value="3" <?php if($actiActual["a_prioridad"] == 3){echo "selected";} ?>>Alta</option>
                            <option value="4" <?php if($actiActual["a_prioridad"] == 4){echo "selected";} ?>>Muy alta</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dificultad</label>
                        <select name="dificultad" class="form-select">
                            <option value="0" <?php if($actiActual["a_dificultad"] == 0){echo "selected";} ?>>N/A</option>
                            <option value="1" <?php if($actiActual["a_dificultad"] == 1){echo "selected";} ?>>Baja</option>
                            <option value="2" <?php if($actiActual["a_dificultad"] == 2){echo "selected";} ?>>Intermedia</option>
                            <option value="3" <?php if($actiActual["a_dificultad"] == 3){echo "selected";} ?>>Alta</option>
                        </select>
                      </div>
                    <br><br><br><br><br>
                  
                    
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary" style="margin-right:5px; background-color: #05A649; border-color: #05a649">
                        <i class="bi bi-pencil-square me-2"></i>Aceptar y editar
                      </button>
                      <a href="actividades.php?view=<?php echo $view ?>"><button type="button" style="margin-left:5px;" class="btn btn-secondary">
                        <i class="bi bi-x-lg me-2"></i>Cancelar
                      </button></a>
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