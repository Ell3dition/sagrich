 <!-- Modal EDITAR -->
 <div class="modal fade" id="EditarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="container mt-5">

           <form id="formEditarPerfil">
             <div class="row justify-content-center">

               <div class="col-md-10">
                 <div class="form-group">
                   <label for="userE">Nombre de Usuario</label>
                   <input type="text" class="form-control" name="userE" disabled value="<?php echo  $_SESSION["usuario"] ?>">
                   <input type="hidden" name="idUsuario" value="<?php echo  $_SESSION["id"] ?>">
                   <input type="hidden" name="imgActualEd" value="<?php echo  $_SESSION["img"] ?>">
                 </div>
               </div>


               <div class="col-md-10">
                 <div class="form-group">
                   <label for="fotoE">Foto </label>
                   <input type="file" class="form-control input-lg" name="fotoE" value="">
                 </div>

                 <div class="form-group mt-2">
                   <label for="fotoE">Imagen Actual </label>
                   <?php
                    if ($_SESSION["img"] == "") {
                      echo '<img src="Vistas/img/users/usersDefault.png" class="img-fluid" style="width: 150px;" alt="">';
                    } else {
                      echo '<img src="' . $_SESSION["img"] . '" class="img-fluid" style="width: 150px;" alt="">';
                    }
                    ?>
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