<!-- Modal -->
<div class="modal fade" id="modalCrearTrabajador" tabindex="-1" aria-labelledby="modalCrearTrabajador" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
            <li>
              <a class="nav-link" href="#step-5">
                Paso 5 <br> <small>Finalizar</small>
              </a>
            </li>
          </ul>

          <div class="tab-content">

            <div id="step-1" class="tab-pane" role="tabpanel">
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
              <div class="container">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="rutN">Rut <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="rutN" name="rutN" placeholder="Ej. 11.111.111-1">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="nombreUnoN">Primer Nombre <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="nombreUnoN" name="nombreUnoN" placeholder="Ej. Juan">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="nombreDosN">Segundo Nombre <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="nombreDosN" name="nombreDosN" placeholder="Ej. Mario">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="apellidoPaternoN">Apellido Paterno <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="apellidoPaternoN" name="apellidoPaternoN" placeholder="Ej. Pérez">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="apellidoMaternoN">Apellido Materno <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="apellidoMaternoN" name="apellidoMaternoN" placeholder="Ej. Pérez">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>


                  <div class="form-group col-md-12">
                    <label for="nacimientoN">Fecha Nacimiento <small class="text-danger text-bold">*</small></label>
                    <input type="date" class="form-control" id="nacimientoN" name="nacimientoN">
                    <div class="invalid-feedback">Campo requerido</div>
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
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>
                </div>
              </div>
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel"><div class="invalid-feedback">Campo requerido</div>
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>

              <div class="form-group">
                <label for="direccionN">Dirección <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="direccionN" name="direccionN" placeholder="Villa dulce pasaje 1 #111, San Clemente">
                <div class="invalid-feedback">Campo requerido</div>
              </div>


              <div class="form-group">
                <label for="emailN">E-mail <small class="text-danger text-bold">*</small></label>
                <input type="email" class="form-control" id="emailN" name="emailN" placeholder="Ej.  correo@correo.cl">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

              <div class="form-group">
                <label for="telefonoN">Teléfono <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="telefonoN" name="telefonoN" placeholder="Ej. +569 81538796">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
            </div>

            <div id="step-3" class="tab-pane" role="tabpanel">
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
              <div class="form-group">
                <label for="afpN">AFP <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="afpN" name="afpN" placeholder="Ej. Capital">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

              <div class="form-group">
                <label for="saludN">Sistema de Salud <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="saludN" name="saludN" placeholder="Ej. Fonasa">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

            </div>

            <div id="step-4" class="tab-pane" role="tabpanel">
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
              <div class="form-group">
                <label for="cargoN">Cargo <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="cargoN" name="cargoN" placeholder="Ej. Supervisor">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
              <div class="form-group">
                <label for="lugarFuncionesN">Lugar Funciones <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="lugarFuncionesN" name="lugarFuncionesN" placeholder="Lugar Funciones">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
              <div class="form-group">
                <label for="fechaIngresoN">Fecha Contrato <small class="text-danger text-bold">*</small></label>
                <input type="date" class="form-control" id="fechaIngresoN" name="fechaIngresoN">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
              <div class="form-group">
                <label for="horarioN">Horario <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="horarioN" name="horarioN" placeholder="Horario">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
            </div>

            <div id="step-5" class="tab-pane" role="tabpanel">
              <div class="container my-5">
                <button type="button" class="btn btn-primary d-none btn-block" id="finishBtn">Finalizar Registro</button>
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

      </div>
    </div>
  </div>
</div>