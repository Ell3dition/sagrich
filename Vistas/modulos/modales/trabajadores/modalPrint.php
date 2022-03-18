<!-- Modal -->
<div class="modal fade" id="modalImprimir" tabindex="-1" aria-labelledby="modalCrearTrabajador" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Trabajador: <strong><span id="nombreTrabajador"></span></strong></h6>
                <h6>Faena: <strong> <span id="faena"></span></strong></h6>
                <input type="hidden" id="idTrabajadorImp">
                <table class="table table-hover table-bordered" id="tablaDocumentosAImprimir">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Imprimir</th>
                        </tr>

                        <!-- comprobanteReglamentoInterno
                                contratoTrabajo
                                declaracionSimpleCovid
                                finiquitoDeTrabajo
                                odiControlCalidad
                                odiJefeCuadrilla
                                odiJunior
                                odiObreroAgricola
                                odiPlanillera
                                odiSupervisor
                                registroEntregaDeElementos
                                registroIndividualInduccion
                            cartaTerminoDeContrato -->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Contrato de Trabajo</td>
                            <td><input type="checkbox" name="contratoTrabajo" id="contratoTrabajo"></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Declaración Simple COVID-19</td>
                            <td><input type="checkbox" name="declaracionSimpleCovid" id="declaracionSimpleCovid"></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Finiquito de Trabajo</td>
                            <td><input type="checkbox" name="finiquitoDeTrabajo" id="finiquitoDeTrabajo"></td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td>Registro Entrega de Elementos</td>
                            <td><input type="checkbox" name="registroEntregaDeElementos" id="registroEntregaDeElementos"></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Registro Individual de Indución</td>
                            <td><input type="checkbox" name="registroIndividualInduccion" id="registroIndividualInduccion"></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Carta Termino de contrato</td>
                            <td><input type="checkbox" name="cartaTerminoDeContrato" id="cartaTerminoDeContrato"></td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Comprobante de Reglamento Interno</td>
                            <td><input type="checkbox" name="comprobanteReglamentoInterno" id="comprobanteReglamentoInterno"></td>
                        </tr>

                        <tr>
                            <th scope="row">8</th>
                            <td>ODI Control Calidad</td>
                            <td><input type="checkbox" name="odiControlCalidad" id="odiControlCalidad"></td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>ODI Jefe Cuadrilla</td>
                            <td><input type="checkbox" name="odiJefeCuadrilla" id="odiJefeCuadrilla"></td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>ODI Junior</td>
                            <td><input type="checkbox" name="odiJunior" id="odiJunior"></td>
                        </tr>
                        <tr>
                            <th scope="row">11</th>
                            <td>ODI Obrero Agricola</td>
                            <td><input type="checkbox" name="odiObreroAgricola" id="odiObreroAgricola"></td>
                        </tr>
                        <tr>
                            <th scope="row">12</th>
                            <td>ODI Planillera</td>
                            <td><input type="checkbox" name="odiPlanillera" id="odiPlanillera"></td>
                        </tr>
                        <tr>
                            <th scope="row">13</th>
                            <td>ODI Supervisor</td>
                            <td><input type="checkbox" name="odiSupervisor" id="odiSupervisor"></td>
                        </tr>

                    </tbody>
                </table>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnImprimirDocumentos">Imprimir</button>
            </div>
        </div>
    </div>
</div>