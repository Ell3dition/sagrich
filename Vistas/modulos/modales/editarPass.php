 <!-- Modal CAMBIO DE CONTRASEÑA-->
 <div class="modal fade" id="cambioPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>

         <button type="button" id="btnCruzModal" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="container mt-1">
           <div class="row justify-content-center">

             <div class="col-md-12" >
               <div class="alert alert-info" id="LeyendaPassDefault" style="display: none;" role="alert">
                
               </div>
            
             </div>
             <div class="col-md-10">
               <div class="form-group">
                 <label for="userModalProblema">Usuario </label>
                 <input type="input" class="form-control input-lg" id="userModalProblema" disabled value="<?php echo  $_SESSION["usuario"] ?>">
               </div>
             </div>

             <div class="col-md-10 my-2" id="contenedorPassActual">
               <label for="passActual">Ingrese Contraseña Actual</label>
               <div class="input-group">
                 <input type="password" class="form-control" id="passActual">
                 <div class="input-group-append">
                   <span class="input-group-text "> <i class="far fa-eye" id="pasEye"></i> </span>
                 </div>
               </div>
             </div>

             <div class="col-md-10">
               <label for="passNueva">Ingrese Nueva Contraseña</label>
               <p class="text-muted">Mínimo 6 carácteres</p>
               <div class="input-group">
                 <input type="password" class="form-control" id="passNueva">
                 <div class="input-group-append">
                   <span class="input-group-text "> <i class="far fa-eye" id="pasEyeNueva"></i> </span>
                 </div>
               </div>
             </div>

             <div class="col-md-10 mt-3">
               <label for="passRep">Repita Nueva Contraseña</label>
               <div class="input-group">
                 <input type="password" class="form-control" id="passRep">
                 <div class="input-group-append">
                   <span class="input-group-text "> <i class="far fa-eye" id="pasEyeRep"></i> </span>
                 </div>
               </div>
             </div>

           </div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" id="btnCancelarModal" data-dismiss="modal">Cancelar</button>
         <button type="button" class="btn btn-primary" id="btnActualizarPass">Actualizar</button>
       </div>
     </div>
   </div>
 </div>


 <!-- Editar perfil -->