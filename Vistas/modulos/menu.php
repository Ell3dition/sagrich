<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- Sidebar user panel (optional) -->
  <div class=" mt-3 pb-3 mb-3 d-flex">
    <a href="#" class="brand-link">
      <?php
      if ($_SESSION["img"] == "") {
        echo '<img src="Vistas/img/users/usersDefault.png"  class="brand-image img-circle elevation-3"
          style="opacity: .8">';
      } else {
        echo '<img src="' . $_SESSION["img"] . '"   class="brand-image img-circle elevation-3"
          style="opacity: .8">';
      }
      ?>
      <span class="brand-text font-weight-light"><strong><?php echo  $_SESSION["usuario"] ?> </strong></span>
    </a>
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <?php
    if ($_SESSION["rol"] == "ADMINISTRADOR") {
      include_once "menu/menuAdministrador.php";
    } else if ($_SESSION["rol"] == "SUPERVISOR CAMPO") {
      include_once "menu/menuSupervisorCampo.php";
    }
    ?>
  </div>
</aside>
<?php
include 'Vistas/modulos/modales/editarPass.php';
include 'Vistas/modulos/modales/editarPerfil.php';
?>