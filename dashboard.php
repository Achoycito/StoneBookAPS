<?php
  $pagActual = 100;
  require 'Conexion.php';
  $instCon = new Conexion();
  require_once 'userSession.php';
  $sesion = new userSession();

  $idUsuario = $_SESSION["idUsuario"];

  $veces = $instCon->getFrecuenciaEmocion($idUsuario);
  $veces = $veces->fetch_assoc();
  $instCon->cerrar();

  $instCon = new Conexion();

  $datosDashboard = $instCon->datosDashboard($idUsuario);
  $dashboardUsuario = $datosDashboard->fetch_assoc();

  $instCon->cerrar();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - StoneBook</title>
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
      <span> Dashboard</span>
      <br>
      <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card blue-card">
                <div class="card-body">
                  <h5 class="card-title">Actividades agregadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-plus"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?=$dashboardUsuario["actiAgreg"]?>
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card green-card">
                <div class="card-body">
                  <h5 class="card-title">Actividades completadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?=$dashboardUsuario["actiCompl"]?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
            
            
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card cyan-card">
                <div class="card-body">
                  <h5 class="card-title">Modificaciones a actividades</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?=$dashboardUsuario["actiModif"]?>
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-6 col-md-6">

              <div class="card info-card orange-card">
                <div class="card-body">
                  <h5 class="card-title">Etiquetas agregadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tags"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?=$dashboardUsuario["etiqAgreg"]?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->

            <!-- Diario Card -->
            <div class="col-xxl-6 col-md-6">

              <div class="card info-card pink-card">
                <div class="card-body">
                  <h5 class="card-title">Entradas de diario agregadas</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-bookmark"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?=$dashboardUsuario["entrAgreg"]?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Diario Card -->




            
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-12">
          
          
          <!-- Cantidad -->
          <div class="card">

            <div class="card-body">
            <h5 class="card-title">Frecuencia de emociones en entradas de diario</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Emoción',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: <?=$veces["frecnull"]?>,
                          name: 'N/A'
                        },
                        {
                          value: <?=$veces["frec1"]?>,
                          name: 'Feliz'
                        },
                        {
                          value: <?=$veces["frec2"]?>,
                          name: 'Triste'
                        },
                        {
                          value: <?=$veces["frec3"]?>,
                          name: 'Enojado'
                        },
                        {
                          value: <?=$veces["frec4"]?>,
                          name: 'Sorprendido'
                        },
                        {
                          value: <?=$veces["frec5"]?>,
                          name: 'Emocionado'
                        },
                        {
                          value: <?=$veces["frec6"]?>,
                          name: 'Confundido'
                        },
                        {
                          value: <?=$veces["frec7"]?>,
                          name: 'Nervioso'
                        },
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->
        </div><!-- End Right side columns -->

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

































