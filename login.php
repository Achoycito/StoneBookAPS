<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inicio de sesión - StoneBook</title>
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

<body style="font-family: 'Open Sans';">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/imgs/icono.png" style="margin-right: 20px;">
                  <span class="d-none d-lg-block">StoneBook</span>
                </a>
              </div><!-- End Logo -->


              <!-- Aviso de inicio de sesion incorrecto -->
              <?php
              if(isset($mensajeError)){
              ?>
              <div class="col-lg-12 alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $mensajeError ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php } ?>
              <!-- Fin aviso de inicio de sesion incorrecto -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-inicio text-center pb-0 fs-4">Iniciar sesión</h5>
                    <p class="text-center small">Inicia sesión con tu cuenta de StoneBook para continuar.</p>
                  </div>

                  <!-- Formulario -->
                  <form class="row g-3 needs-validation" action = "index.php" method="post" novalidate>
                    <div class="col-12">
                      <label class="form-label" >Nombre de usuario</label>
                      <div class="input-group has-validation">
                        <input required name="username" type="text" autocomplete="off" maxlength="50" class="form-control">
                        <div class="invalid-feedback">Por favor escriba su nombre de usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Contraseña</label>
                      <input required name="password" type="password" maxlength="100" class="form-control">
                      <div class="invalid-feedback">Por favor escriba su contraseña.</div>
                    </div>

                    <div class="col-12">
                      <br>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit"  style="background-color: #05A649; border-color: #05a649">Iniciar sesión</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">¿No tienes una cuenta StoneBook? <a href="registrar.php">Regístrate</a></p>
                    </div>
                  </form>
                  <!-- Fin Formulario -->

                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


  
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