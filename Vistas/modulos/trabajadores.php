<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h3>
            Mantenedor Trabajadores
          </h3>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <!---aqui Van los select por si aplicas filtro para la busqueda-->
        <div class="container">
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
              <button data-toggle="modal" data-target="#modalCrearTrabajador" class="btn btn-success">Crear Trabajador</button>
            </div>
          </div>
        </div>



      </div>


      <div class="box-body">

        <!--EL CUERPO DEL PROYECTO TABLAS Y COSAS RARAS--->


        <div class="container mt-4">
          <table class="table table-hover table-bordered" id="tabla-trabajadores">
            <thead class="thead-light">
              <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <!-- <th>Fecha Nacimiento</th>
                <th>Estado Civil</th>
                <th>Domicilio</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>AFP</th>
                <th>Salud</th> -->
                <th>Cargo</th>
                <th>Lugar Funciones</th>
                <th>Horario</th>
                <th class="no-exportar">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td>17981014-k</td>
                <td>Juan Perez</td>
                <td>Av. Las Flores #123</td>
                <td>+56912345678</td>
                <td>Fonasa</td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar">
                    <i class="fa fa-edit"></i>
                  </button>
           
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalImprimir">
                    <i class="fa fa-print"></i>
                  </button>
                  <button type="button" class="btn btn-danger Eliminar">
                    <i class="fa fa-trash"></i>
                  </button>

                </td>
              </tr> -->



            </tbody>

          </table>
        </div>



      </div>
      <!-- /.box-body -->


    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>


<!--por si haces MODAL AQUI PARA ABAJO--->

<?php
  include_once 'modales/trabajadores/modalCrear.php';
  include_once 'modales/trabajadores/modalEditar.php';
  include_once 'modales/trabajadores/modalPrint.php';

?>