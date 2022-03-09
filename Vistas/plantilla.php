<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once "Controladores/routesC.php";
require_once "Controladores/routesJSC.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador de contenidos V2.0.0</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="Vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="Vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="Vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="Vistas/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="Vistas/css/estilosLogin.css" rel="stylesheet">

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <link rel="stylesheet" href="Vistas/css/dataTable.css">

  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body id="cuerpoPagina" class="hold-transition sidebar-mini layout-fixed">





  <?php

  if (isset($_SESSION["Ingreso"]) && $_SESSION["Ingreso"]  == TRUE) {


    echo '<div class="wrapper">';

    if ($_SESSION["passDefault"] == 'Default') {

      include "Vistas/modulos/modales/editarPass.php";

      echo '<script src="Vistas/plugins/jquery/jquery.min.js"></script>
            <script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="Vistas/js/app/editPass.js" type="module"></script>';

      return;
    }
    include "modulos/menu.php";
    include "modulos/cabeceras.php";

    if (isset($_GET["url"])) {

      if ($_SESSION["rol"] == "ADMINISTRADOR") {

        $routes = new RoutesC();
        $routes->routesAdministrador($_GET["url"]);
      } else {

        include "Vistas/modulos/accessDenied.php";
      }
    } else {

      include "modulos/inicio.php";
    }

    echo '</div>';
  } else {

    include "modulos/ingreso.php";
  }



  ?>





  <!-- jQuery -->
  <script src="Vistas/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="Vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="Vistas/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="Vistas/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="Vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="Vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="Vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="Vistas/plugins/moment/moment.min.js"></script>

  <script src="Vistas/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="Vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="Vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="Vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="Vistas/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!-- datatables con bootstrap -->
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

  <!-- Para usar los botones -->
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

   <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

  <script src="Vistas/js/app/sidebar.js"></script>

  <?php

  if (isset($_SESSION["Ingreso"]) && $_SESSION["Ingreso"]  == TRUE) {
    echo ' <script src="Vistas/js/app/cabecera.js" type="module"></script>';
    if ($_GET["url"] != "") {
      if ($_SESSION["rol"] == "ADMINISTRADOR") {

        $routes = new RoutesJSC();
        $routes->routesAdministrador($_GET["url"]);
      }
    }
  }
  ?>




</body>

</html>