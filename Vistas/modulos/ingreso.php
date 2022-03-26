<div class="container login-container">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-md-6 login-form-1 d-flex justify-content-center">

            <img src="Vistas/img/login/login-1.jpeg" class="img-fluid" alt="">

        </div>
        <div class="col-10 col-md-6 login-form-2">

            <form id="formIngreso" class="mt-5">
                <h3 class="mb-3"><strong>Bienvenido</strong> </h3>
                <div class="form-group">
                    <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" name="usuario-Ing" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="clave-Ing" required>
                </div>
                <div class="form-group d-flex justify-content-center">
                    
                    <div id="html_element"></div>
                    
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" class="btnSubmit btn btn-lg btn-block" />
                </div>
         
            </form>
        </div>
    <div class="col-md-12 mt-3">
        <div class="text-ligth text-md-left text-center">
            <p>Desarrollado por <a href="https://www.sertimac.cl" target="_blank">SERTIMAC</a> V.1.1.0.</p>
        </div>
    </div>

  
</div>
  
</div>

<script src="Vistas/js/app/ingreso.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
