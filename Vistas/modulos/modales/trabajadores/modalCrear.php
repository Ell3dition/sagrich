<!-- Modal -->
<div class="modal fade" id="modalCrearTrabajador" tabindex="-1" aria-labelledby="modalCrearTrabajador" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Trabajador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="smartCrear">
          <ul class="nav">
            <li>
              <a class="nav-link" href="#step-1">
                Paso 1 <br> <small>Info. Trabajador</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#step-2">
                Paso 2 <br> <small>Contácto Trabajador</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#step-3">
                Paso 3 <br> <small>Previsión y Salud</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#step-4">
                Paso 4 <br> <small>Condiciones Contrato</small>
              </a>
            </li>
          </ul>

          <div class="tab-content">
            <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
            <div id="step-1" class="tab-pane" role="tabpanel">
              <div class="container">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="rutN">Rut <small class="text-danger text-bold">*</small></label>
                  <input type="text" class="form-control" id="rutN" name="rutN" placeholder="Ej. 11.111.111-1">
                </div>

                <div class="form-group col-md-6">
                  <label for="nombreUnoN">Primer Nombre <small class="text-danger text-bold">*</small></label>
                  <input type="text" class="form-control" id="nombreUnoN" name="nombreUnoN" placeholder="Ej. Juan">
                </div>

                <div class="form-group col-md-6">
                  <label for="nombreDosN">Segundo Nombre <small class="text-danger text-bold">*</small></label>
                  <input type="text" class="form-control" id="nombreDosN" name="nombreDosN" placeholder="Ej. Mario">
                </div>

                <div class="form-group col-md-6">
                  <label for="apellidoPaternoN">Apellido Paterno <small class="text-danger text-bold">*</small></label>
                  <input type="text" class="form-control" id="apellidoPaternoN" name="apellidoPaternoN" placeholder="Ej. Pérez">
                </div>

                <div class="form-group col-md-6">
                  <label for="apellidoMaternoN">Apellido Materno <small class="text-danger text-bold">*</small></label>
                  <input type="text" class="form-control" id="apellidoMaternoN" name="apellidoMaternoN" placeholder="Ej. Pérez">
                </div>


                <div class="form-group col-md-12">
                  <label for="nacimientoN">Fecha Nacimiento <small class="text-danger text-bold">*</small></label>
                  <input type="date" class="form-control" id="nacimientoN" name="nacimientoN">
                </div>
                <div class="form-group col-md-12">
                  <label for="estadoCivilN">Estado Civil <small class="text-danger text-bold">*</small></label>
                  <select class="form-control" name="estadoCivilN" id="estadoCivilN">
                    <option value="">Seleccione</option>
                    <option value="Soltero/a">Soltero/a</option>
                    <option value="Casado/a">Casado/a</option>
                    <option value="Viudo/a">Viudo/a</option>
                    <option value="Divorciado/a">Divorciado/a</option>
                    <option value="Conviviente Civil">Conviviente Civil</option>
                  </select>
                </div>
              </div>
              </div>
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel">


              <div class="form-group">
                <label for="direccionN">Dirección <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="direccionN" name="direccionN" placeholder="Villa dulce pasaje 1 #111, San Clemente">
              </div>


              <div class="form-group">
                <label for="emailN">E-mail <small class="text-danger text-bold">*</small></label>
                <input type="email" class="form-control" id="emailN" name="emailN" placeholder="Ej.  correo@correo.cl">
              </div>

              <div class="form-group">
                <label for="telefonoN">Teléfono <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="telefonoN" name="telefonoN" placeholder="Ej. +569 81538796">
              </div>
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel">
              <div class="form-group">
                <label for="afpN">AFP <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="afpN" name="afpN" placeholder="Ej. Capital">
              </div>

              <div class="form-group">
                <label for="saludN">Sistema de Salud <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="saludN" name="saludN" placeholder="Ej. Fonasa">
              </div>

            </div>
            <div id="step-4" class="tab-pane" role="tabpanel">
              <div class="form-group">
                <label for="cargoN">Cargo <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="cargoN" name="cargoN" placeholder="Ej. Supervisor">
              </div>
              <div class="form-group">
                <label for="lugarFuncionesN">Lugar Funciones <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="lugarFuncionesN" name="lugarFuncionesN" placeholder="Lugar Funciones">
              </div>
              <div class="form-group">
                <label for="fechaIngresoN">Fecha Contrato <small class="text-danger text-bold">*</small></label>
                <input type="date" class="form-control" id="fechaIngresoN" name="fechaIngresoN">
              </div>
              <div class="form-group">
                <label for="horarioN">Horario <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="horarioN" name="horarioN" placeholder="Horario">
              </div>
            </div>
          </div>
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <!-- boton anterior -->
        <button type="button" class="btn btn-secondary" id="prevBtn">Anterior</button>
        <!-- boton siguiente -->
        <button type="button" class="btn btn-primary" id="nextBtn">Siguiente</button>
        <button type="button" class="btn btn-success d-none" id="finishBtn">Guardar</button>
      </div>
    </div>
  </div>
</div>