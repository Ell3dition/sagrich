<!-- Modal -->
<div class="modal fade" id="modalEditarTrabajador" tabindex="-1" aria-labelledby="modalEditarTrabajador" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Trabajador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="smartEditar">
          <ul class="nav">
            <li>
              <a class="nav-link" href="#Paso-1">
                Paso 1 <br> <small>Info. Trabajador</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#Paso-2">
                Paso 2 <br> <small>Contácto Trabajador</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#Paso-3">
                Paso 3 <br> <small>Previsión y Salud</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#Paso-4">
                Paso 4 <br> <small>Condiciones Contrato</small>
              </a>
            </li>
            <li>
              <a class="nav-link" href="#Paso-5">
                Paso 5 <br> <small>Finalizar</small>
              </a>
            </li>
          </ul>

          <div class="tab-content">

            <div id="Paso-1" class="tab-pane" role="tabpanel">
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
              <div class="container">
                <div class="row">
                  <input type="hidden" name="" id="idTrabajador">
                  <div class="form-group col-md-12">
                    <label for="rutEd">Rut <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="rutEd" name="rutEd" placeholder="Ej. 11.111.111-1">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="nombreUnoEd">Primer Nombre <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="nombreUnoEd" name="nombreUnoEd" placeholder="Ej. Juan">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="nombreDosEd">Segundo Nombre <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="nombreDosEd" name="nombreDosEd" placeholder="Ej. Mario">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="apellidoPaternoEd">Apellido Paterno <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="apellidoPaternoEd" name="apellidoPaternoEd" placeholder="Ej. Pérez">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="apellidoMaternoEd">Apellido Materno <small class="text-danger text-bold">*</small></label>
                    <input type="text" class="form-control" id="apellidoMaternoEd" name="apellidoMaternoEd" placeholder="Ej. Pérez">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>


                  <div class="form-group col-md-12">
                    <label for="nacimientoEd">Fecha Nacimiento <small class="text-danger text-bold">*</small></label>
                    <input type="date" class="form-control" id="nacimientoEd" name="nacimientoEd">
                    <div class="invalid-feedback">Campo requerido</div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="estadoCivilEd">Estado Civil <small class="text-danger text-bold">*</small></label>
                    <select class="form-control" name="estadoCivilEd" id="estadoCivilEd">
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
            <div id="Paso-2" class="tab-pane" role="tabpanel"><div class="invalid-feedback">Campo requerido</div>
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>

              <div class="form-group">
                <label for="direccionEd">Dirección <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="direccionEd" name="direccionEd" placeholder="Villa dulce pasaje 1 #111, San Clemente">
                <div class="invalid-feedback">Campo requerido</div>
              </div>


              <div class="form-group">
                <label for="emailEd">E-mail <small class="text-danger text-bold">*</small></label>
                <input type="email" class="form-control" id="emailEd" name="emailEd" placeholder="Ej.  correo@correo.cl">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

              <div class="form-group">
                <label for="telefonoEd">Teléfono <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="telefonoEd" name="telefonoEd" placeholder="Ej. +569 81538796">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
            </div>

            <div id="Paso-3" class="tab-pane" role="tabpanel">
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
              <div class="form-group">
                <label for="afpEd">AFP <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="afpEd" name="afpEd" placeholder="Ej. Capital">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

              <div class="form-group">
                <label for="saludEd">Sistema de Salud <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="saludEd" name="saludEd" placeholder="Ej. Fonasa">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

            </div>

            <div id="Paso-4" class="tab-pane" role="tabpanel">
              <p class="text-danger text-bold text-center mt-3">Campos Obligatorios (*)</p>
              <div class="form-group">
                <label for="cargoEd">Cargo <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="cargoEd" name="cargoEd" placeholder="Ej. Supervisor">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
              <div class="form-group">
                <label for="lugarFuncionesEd">Dirección Faena <small class="text-danger text-bold">*</small></label><br>
                <div  class="alert alert-primary" role="alert" > La ciudad debe ir separa por una coma (,) despues de la dirección <br> Ej: Parcela # 74 LT 3A , San Clemente</div>
                <input type="text" class="form-control" id="lugarFuncionesEd" name="lugarFuncionesEd" placeholder="Lugar Funciones">
                <div class="invalid-feedback">Campo requerido</div>
              </div>

              <div class="form-group">
                <label for="nombreFaenaEd">Nombre Faena <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="nombreFaenaEd" name="nombreFaenaEd">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
              <div class="form-group">
                <label for="fechaIngresoEd">Fecha Contrato</label>
                <input type="date" class="form-control" id="fechaIngresoEd" name="fechaIngresoEd">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
              <div class="form-group">
                <label for="horarioEd">Horario <small class="text-danger text-bold">*</small></label>
                <input type="text" class="form-control" id="horarioEd" name="horarioEd" placeholder="Horario">
                <div class="invalid-feedback">Campo requerido</div>
              </div>
            </div>

            <div id="Paso-5" class="tab-pane" role="tabpanel">
              <div class="container my-5">
                <button type="button" class="btn btn-primary d-none btn-block" id="finishBtnEd">Finalizar</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <!-- boton anterior -->
        <button type="button" class="btn btn-secondary" id="prevBtnEd">Anterior</button>
        <!-- boton siguiente -->
        <button type="button" class="btn btn-primary" id="nextBtnEd">Siguiente</button>

      </div>
    </div>
  </div>
</div>