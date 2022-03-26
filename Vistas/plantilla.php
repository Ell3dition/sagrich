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
  <meta name="description" content="Sistema web para generar documentos">
  <meta name="keywords" content="agricultura, generar, documentos">
  <meta name="author" content="sertimac.cl">
  <title>SAGRICH SPA</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="Vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="Vistas/css/estilosLogin.css" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
  <link rel="stylesheet" href="Vistas/dist/css/smart-wizard/smart_wizard_all.css">
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
      } else if ($_SESSION["rol"] == "SUPERVISOR CAMPO") {
        $routes = new RoutesC();
        $routes->routesSupervisorCampo($_GET["url"]);
      } else {
        include "Vistas/modulos/accessDenied.php";
      }
    } else {
      echo '<script> window.location = "trabajadores";</script>';
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
  <!--Para los estilos del excel-->
  <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.2/js/buttons.html5.styles.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.2/js/buttons.html5.styles.templates.min.js"></script>
  <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <script src="Vistas/js/app/sidebar.js"></script>
  <script src="Vistas/dist/js/smart-wizard/jquery.smartWizard.js"></script>
  <?php
  if (isset($_SESSION["Ingreso"]) && $_SESSION["Ingreso"]  == TRUE) {
    echo ' <script src="Vistas/js/app/cabecera.js" type="module"></script>';
    if (isset($_GET["url"])) {
      if ($_SESSION["rol"] == "ADMINISTRADOR") {
        $routes = new RoutesJSC();
        $routes->routesAdministrador($_GET["url"]);
      } else if ($_SESSION["rol"] == "SUPERVISOR CAMPO") {
        $routes = new RoutesJSC();
        $routes->routesSupervisorCampo($_GET["url"]);
      }
    }
  }
  ?>
</body>

</html>