 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light  d-flex justify-content-between">
   <!-- Left navbar links -->

    
       
       <div class="col-md-5">
         
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
           </li>
           
          </ul>
         </div>
    
         <div class="col-md-3 d-flex justify-content-end">
         <ul class="navbar-nav cerrarSesion">

           <li class="nav-item ">
            <a href="#" class="nav-link" id="salir">
              <i class="fas fa-power-off nav-icon"> Cerrar Sesión</i>
             
            </a>
          </li>
          
        </ul>
         </div>

         <style>

          .cerrarSesion li a i{
            color: white;
            padding: 5px;
            
          }

          .cerrarSesion li {
            background-color: rgba(220,20,2,0.71);
            border-radius: 0.7rem;
           
          }

          .cerrarSesion li:hover {
            background-color: rgba(213,109,99,0.71);
            
          }
            
          


         </style>
  
       
       
       
    
 </nav>



 <!-- Modal INFORMAR PROBLEMA-->
 <div class="modal fade" id="Problema" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Informar Problema</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="container mt-1">
           <div class="row justify-content-center">
             <div class="col-md-10">
               <div class="form-group">
                 <label for="userModalProblema">Usuario </label>
                 <input type="input" class="form-control input-lg" id="userModalProblema" disabled value="<?php echo  $_SESSION["usuario"] ?>">
               </div>
             </div>
             <div class="col-md-10">
               <div class="form-group">
                 <label for="MedioModalProblema">Medio Contácto </label>
                 <select class="custom-select" id="MedioModalProblema">
                   <option value="">Seleccione medio de contácto</option>
                   <option value="">Teléfono</option>
                   <option value="">Correo</option>
                 </select>
               </div>
             </div>
             <div class="col-md-10">
               <div class="form-group">
                 <label for="medioContactoModalProblema">Ingrese Medio Contácto </label>
                 <input type="input" class="form-control input-lg" id="medioContactoModalProblema">
               </div>
             </div>
             <div class="col-md-10">
               <div class="form-group">
                 <label for="detalleModalProblema">Detalle</label>
                 <textarea class="form-control input-lg" id="detalleModalProblema" style=" min-width: auto;min-height: 120px;max-height: 120px" placeholder="Explique brevemente el problema, identificando el módulo del sistema"></textarea>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         <button type="button" class="btn btn-primary">Enviar</button>
       </div>
     </div>
   </div>
 </div>