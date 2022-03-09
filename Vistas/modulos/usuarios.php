<div class="content-wrapper">
    <section class="content-header container">

        <div class="row">
            <div class="col-md-5">
                <div class="text-center">
                    <h5>Mantenedor Usuarios</h5>
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
                    <div class="row mt-2">
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label for="btnCrear"><br></label>
                                <button type="button" data-toggle="modal" data-target="#crearFamilia" id="btnCrear"
                                    class="btn btn-success align-self-center">Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin BOX HEADER-->


            <div class="box-body">

                <!--EL CUERPO DEL PROYECTO TABLAS Y COSAS RARAS--->

                <table class="table table-bordered table-hover TB" id="tabla">


                    <thead class="thead-dark">

                        <tr>
                            <th>N°</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>


<!--por si haces MODAL AQUI PARA ABAJO--->


<!-- Modal CREAR FAMILIA ESCUELA -->
<div class="modal fade" id="crearFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"                                       
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container mt-5">

                    <form id="formUsuarioCrear">
                        <div class="row justify-content-center">

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="userN">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="userN" name="userN" required>
                                </div>
                            </div>
                            
                            <div class="col-md-10">
                                <div class="form-group">

                                    <label for="rolN">Rol </label>
                                    <select class="custom-select" name="rolN" id="rolN" required>
                                        <option value="0">Seleccione un Rol</option>
                                        <option value="ADMINISTRADOR">Administrador</option>
                                    </select>

                                </div>
                            </div>


                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="fotoN">Foto </label>
                                    <input type="file" class="form-control input-lg" name="fotoN" id="fotoN">
                                </div>

                            </div>

                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>

            </div>

            </form>

        </div>
    </div>
</div>




<!-- Modal EDITAR -->
<div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"                                       
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container mt-5">

                    <form id="formUsuarioEditar">
                        <div class="row justify-content-center">

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="userE">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="userE" name="userE" required>
                                    <input type="hidden" id="idUsuario" name="idUsuario">
                                    <input type="hidden" id="imgActualEd" name="imgActualEd">
                                </div>
                            </div>
                            
                            <div class="col-md-10">
                                <div class="form-group">

                                    <label for="rolE">Rol </label>
                                    <select class="custom-select" name="rolE" id="rolE" required>
                                        <option value="0">Seleccione un Rol</option>
                                        <option value="ADMINISTRADOR">Administrador</option>
                                    </select>

                                </div>
                            </div>


                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="fotoE">Foto </label>
                                    <input type="file" class="form-control input-lg" name="fotoE" id="fotoE">
                                </div>

                                <div class="form-group">
                                    <label for="fotoE">Imagen Actual </label>
                                    <img id="imgActual" name="imgActual" class="img-fluid"  style="width: 150px;" alt="">
                                </div>
                            </div>

                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>

            </div>

            </form>

        </div>
    </div>
</div>



