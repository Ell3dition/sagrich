import {
  crearDATATABLE,
  crearSmartWizard,
  animacionBtn,
  removerAnimacionBtn,
  LimpiarDataTable,
  formatoFecha,
} from "../helpers/funciones.js";
import {
  validarInputs,
  validarSteepCuatro,
  validarSteepDos,
} from "./trabajadores/validaciones.js";

import "../helpers/validaRut.js";

document.addEventListener("DOMContentLoaded", async function (e) {
  crearSmartWizard("smartCrear");
  crearSmartWizard("smartEditar");

  const trabajadores = await cargarTrabajadores();
  renderizarTabla(trabajadores);
});

document.addEventListener("click", function (e) {
  if (
    e.target.className == "btn btn-danger Eliminar" ||
    e.target.className == "fa fa-trash"
  ) {
    cambiarEstadoTrabajador(e.target, "DESHABILITAR");
  } else if (
    e.target.className == "btn btn-primary Editar" ||
    e.target.className == "fa fa-edit"
  ) {
    setearModalEditar(e.target);
  } else if (
    e.target.className == "btn btn-success Imprimir" ||
    e.target.className == "fa fa-print"
  ) {
    setearModalImprimir(e.target);
  } else if (
    e.target.className == "btn btn-success Activar" ||
    e.target.className == "fa fa-check"
  ) {
    cambiarEstadoTrabajador(e.target, "ACTIVAR");
  }
});

//DECLARAR VARIABLES
const smartCrear = document.getElementById("smartCrear");
const rutN = document.getElementById("rutN");
const nombreUnoN = document.getElementById("nombreUnoN");
const nombreDosN = document.getElementById("nombreDosN");
const apellidoPaternoN = document.getElementById("apellidoPaternoN");
const apellidoMaternoN = document.getElementById("apellidoMaternoN");
const nacimientoN = document.getElementById("nacimientoN");
const estadoCivilN = document.getElementById("estadoCivilN");
const direccionN = document.getElementById("direccionN");
const emailN = document.getElementById("emailN");
const telefonoN = document.getElementById("telefonoN");
const afpN = document.getElementById("afpN");
const saludN = document.getElementById("saludN");
const cargoN = document.getElementById("cargoN");

const lugarFuncionesN = document.getElementById("lugarFuncionesN");

const nombreFaenaN = document.getElementById("nombreFaenaN");
const fechaIngresoN = document.getElementById("fechaIngresoN");
const horarioN = document.getElementById("horarioN");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const finishBtn = document.getElementById("finishBtn");

const nombreTrabajadorModalImp = document.getElementById("nombreTrabajador");
const faenaModalImp = document.getElementById("faena");
const idTrabajadorImp = document.getElementById("idTrabajadorImp");
const btnImprimirDocumentos = document.getElementById("btnImprimirDocumentos");
const tablaDocumentosAImprimir = document.getElementById(
  "tablaDocumentosAImprimir"
);

const checkTodos = document.getElementById("checkTodos");

checkTodos.addEventListener("change", async function (e) {
  renderizarTabla(await cargarTrabajadores());
});

const url = "Controladores/trabajadoresC.php";

async function cargarTrabajadores() {
  const todos = checkTodos.checked ? "todos" : "";

  const response = await fetch(url, {
    method: "POST",
    body: new URLSearchParams({ accion: "listar", todos }),
  });
  const data = await response.json();
  return data;
}

function renderizarTabla(data) {
  LimpiarDataTable("tabla-trabajadores");

  const tbody = document.querySelector("#tabla-trabajadores tbody");

  const { TRABAJADORES, ROL } = data;
  let trs = [];
  TRABAJADORES.forEach((trabajador) => {
    const tr = document.createElement("tr");
    const btns = configurarBtns(trabajador, ROL);

    if (trabajador.ESTADO != "ACTIVO") {
      tr.classList.add("table-danger");
    }

    tr.innerHTML = `
      <td>${trabajador.RUT}</td>
      <td>${trabajador.NOMBRE}</td>
      <td>${trabajador.CARGO}</td>
      <td>${trabajador.LUGAR}</td>
      <td>${trabajador.HORARIO}</td>
      <td>
        ${btns}

      </td>
      `;

    trs.push(tr);
  });

  tbody.append(...trs);

  crearDATATABLE("tabla-trabajadores", null, "trabajadores", 10, false);
}

async function cambiarEstadoTrabajador(elemento, estado) {
  let id = "";
  if (elemento.tagName == "I") {
    id = elemento.parentElement.dataset.id;
  } else {
    id = elemento.dataset.id;
  }

  if(estado != "ACTIVAR"){
    const { isConfirmed } = await Swal.fire({
      title: "¿Estás seguro?",
      text: "¡No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      cancelButtonColor: "#3085d6",
      confirmButtonColor: "#d33",
      confirmButtonText: "¡Sí, eliminar!",
    });
  
    if (!isConfirmed) return;
  

  }

  
  const response = await fetch(url, {
    method: "POST",
    body: new URLSearchParams({ accion: "cambiarEstado", id, estado }),
  });

  const { ESTADO, MOTIVO } = await response.json();

  Swal.fire({
    title: ESTADO ? "Exito" : "Error",
    text: MOTIVO,
    icon: ESTADO ? "success" : "error",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
  });

  if (ESTADO) {
    renderizarTabla(await cargarTrabajadores());
  }
}

prevBtn.addEventListener("click", function (e) {
  e.preventDefault();
  $(smartCrear).smartWizard("prev");
});

nextBtn.addEventListener("click", function (e) {
  e.preventDefault();
  $(smartCrear).smartWizard("next");
});

//EVENTO PARA CAMBIAR EL ESTADO DEL BOTON FINISH
$(smartCrear).on(
  "stepContent",
  function (e, anchorObject, stepIndex, stepDirection) {
    const li = document
      .querySelector("#smartCrear .nav")
      .querySelectorAll("li");
    if (stepIndex == li.length - 1) {
      finishBtn.classList.remove("d-none");
      nextBtn.classList.add("d-none");
    } else {
      finishBtn.classList.add("d-none");
      nextBtn.classList.remove("d-none");
    }
  }
);

$(smartCrear).on(
  "leaveStep",
  function (e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
    if (stepDirection === "forward") {
      if (currentStepIndex === 0) {
        const datos = [
          rutN,
          nombreUnoN,
          nombreDosN,
          apellidoPaternoN,
          apellidoMaternoN,
          nacimientoN,
          estadoCivilN,
        ];
        const result = validarInputs(datos);

        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 1",
          });
          e.preventDefault();
        }
      } else if (currentStepIndex === 1) {
        const datos = [emailN, direccionN, telefonoN];
        const result = validarSteepDos(datos);
        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 2",
          });
          e.preventDefault();
        }
      } else if (currentStepIndex === 2) {
        const datos = [afpN, saludN];
        const result = validarInputs(datos);
        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 3",
          });
          e.preventDefault();
        }
      } else if (currentStepIndex === 3) {
        const datos = [
          lugarFuncionesN,
          cargoN,
          nombreFaenaN,
          fechaIngresoN,
          horarioN,
        ];
        const result = validarSteepCuatro(datos);
        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 4",
          });
          e.preventDefault();
        }
      }
    }
  }
);
$("input#rutN").rut({
  formatOn: "keyup",
  minimumLength: 8,
  validateOn: "change",
});

rutN.addEventListener("blur", function (e) {
  const res = $.validateRut(this.value);
  if (res != true) {
    Swal.fire({
      title: "Error",
      text: "El rut ingresado no es valido",
      icon: "error",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Aceptar",
    });
    rutN.classList.add("is-invalid");
    rutN.classList.remove("is-valid");
  } else {
    rutN.classList.remove("is-invalid");
    rutN.classList.add("is-valid");
  }
});

finishBtn.addEventListener("click", async function (e) {
  animacionBtn(finishBtn, "Guardando...");

  const rutSinSplitear = rutN.value.split("-");
  const rutConPuntos = rutSinSplitear[0];
  const dv = rutSinSplitear[1];
  const rutSinPuntos = rutConPuntos.split(".").join("");

  const direccionFaena = lugarFuncionesN.value.split(",")[0];
  const comunaFaena = lugarFuncionesN.value.split(",")[1];
  const datos = {
    rut: rutSinPuntos,
    dv: dv,
    nombreUno: nombreUnoN.value,
    nombreDos: nombreDosN.value,
    apellidoUno: apellidoPaternoN.value,
    apellidoDos: apellidoMaternoN.value,
    nacimiento: nacimientoN.value,
    civil: estadoCivilN.value,
    direccion: direccionN.value,
    email: emailN.value,
    telefono: telefonoN.value,
    afp: afpN.value,
    salud: saludN.value,
    cargo: cargoN.value,
    lugar: direccionFaena,
    comuna: comunaFaena,
    nombreFaena: nombreFaenaN.value,
    fechaIngreso: fechaIngresoN.value,
    horario: horarioN.value,
  };

  const data = new FormData();
  data.append("datos", JSON.stringify(datos));
  data.append("accion", "guardar");

  const response = await fetch(url, {
    method: "POST",
    body: data,
  });

  const { ESTADO, MOTIVO } = await response.json();

  removerAnimacionBtn(finishBtn, "Finalizar Registro");

  Swal.fire({
    title: ESTADO ? "Exito" : "Error",
    text: MOTIVO,
    icon: ESTADO ? "success" : "error",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
  });

  if (ESTADO) {
    renderizarTabla(await cargarTrabajadores());
    limpiarCrear();
  }
});

function limpiarCrear() {
  $("#modalCrearTrabajador").modal("hide");
  $(smartCrear).smartWizard("reset");
  rutN.value = "";
  nombreUnoN.value = "";
  nombreDosN.value = "";
  apellidoPaternoN.value = "";
  apellidoMaternoN.value = "";
  nacimientoN.value = "";
  estadoCivilN.value = "";
  direccionN.value = "";
  emailN.value = "";
  telefonoN.value = "";
  afpN.value = "";
  saludN.value = "";
  cargoN.value = "";
  lugarFuncionesN.value = "";
  nombreFaenaN.value = "";
  fechaIngresoN.value = "";
  horarioN.value = "";

  rutN.classList.remove("is-valid");
  nombreUnoN.classList.remove("is-valid");
  nombreDosN.classList.remove("is-valid");
  apellidoPaternoN.classList.remove("is-valid");
  apellidoMaternoN.classList.remove("is-valid");
  nacimientoN.classList.remove("is-valid");
  estadoCivilN.classList.remove("is-valid");
  direccionN.classList.remove("is-valid");
  emailN.classList.remove("is-valid");
  telefonoN.classList.remove("is-valid");
  afpN.classList.remove("is-valid");
  saludN.classList.remove("is-valid");
  cargoN.classList.remove("is-valid");
  lugarFuncionesN.classList.remove("is-valid");
  nombreFaenaN.classList.remove("is-valid");
  fechaIngresoN.classList.remove("is-valid");
  horarioN.classList.remove("is-valid");
}

/*
============================================================
==============EDITAR TRABAJADOR=============================
============================================================
*/

//DECLARAR VARIABLES
const smartEditar = document.getElementById("smartEditar");
const idTrabajador = document.getElementById("idTrabajador");
const rutEd = document.getElementById("rutEd");
const nombreUnoEd = document.getElementById("nombreUnoEd");
const nombreDosEd = document.getElementById("nombreDosEd");
const apellidoPaternoEd = document.getElementById("apellidoPaternoEd");
const apellidoMaternoEd = document.getElementById("apellidoMaternoEd");
const nacimientoEd = document.getElementById("nacimientoEd");
const estadoCivilEd = document.getElementById("estadoCivilEd");
const direccionEd = document.getElementById("direccionEd");
const emailEd = document.getElementById("emailEd");
const telefonoEd = document.getElementById("telefonoEd");
const afpEd = document.getElementById("afpEd");
const saludEd = document.getElementById("saludEd");
const cargoEd = document.getElementById("cargoEd");
const lugarFuncionesEd = document.getElementById("lugarFuncionesEd");
const nombreFaenaEd = document.getElementById("nombreFaenaEd");
const fechaIngresoEd = document.getElementById("fechaIngresoEd");
const horarioEd = document.getElementById("horarioEd");
const prevBtnEd = document.getElementById("prevBtnEd");
const nextBtnEd = document.getElementById("nextBtnEd");
const finishBtnEd = document.getElementById("finishBtnEd");

prevBtnEd.addEventListener("click", function (e) {
  e.preventDefault();
  $(smartEditar).smartWizard("prev");
});

nextBtnEd.addEventListener("click", function (e) {
  e.preventDefault();
  $(smartEditar).smartWizard("next");
});

//EVENTO PARA CAMBIAR EL ESTADO DEL BOTON FINISH
$(smartEditar).on(
  "stepContent",
  function (e, anchorObject, stepIndex, stepDirection) {
    const li = document
      .querySelector("#smartEditar .nav")
      .querySelectorAll("li");
    if (stepIndex == li.length - 1) {
      finishBtnEd.classList.remove("d-none");
      nextBtnEd.classList.add("d-none");
    } else {
      finishBtnEd.classList.add("d-none");
      nextBtnEd.classList.remove("d-none");
    }
  }
);

$(smartEditar).on(
  "leaveStep",
  function (e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
    if (stepDirection === "forward") {
      if (currentStepIndex === 0) {
        const datos = [
          rutEd,
          nombreUnoEd,
          nombreDosEd,
          apellidoPaternoEd,
          apellidoMaternoEd,
          nacimientoEd,
          estadoCivilEd,
        ];
        const result = validarInputs(datos);

        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 1",
          });
          e.preventDefault();
        }
      } else if (currentStepIndex === 1) {
        const datos = [emailEd, direccionEd, telefonoEd];
        const result = validarSteepDos(datos);
        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 2",
          });
          e.preventDefault();
        }
      } else if (currentStepIndex === 2) {
        const datos = [afpEd, saludEd];
        const result = validarInputs(datos);
        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 3",
          });
          e.preventDefault();
        }
      } else if (currentStepIndex === 3) {
        const datos = [
          lugarFuncionesEd,
          cargoEd,
          nombreFaenaEd,
          fechaIngresoEd,
          horarioEd,
        ];
        const result = validarSteepCuatro(datos);
        if (!result) {
          Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Revise los campos que están incompletos en el paso 4",
          });
          e.preventDefault();
        }
      }
    }
  }
);
$("input#rutEd").rut({
  formatOn: "keyup",
  minimumLength: 8,
  validateOn: "change",
});

rutEd.addEventListener("blur", function (e) {
  const res = $.validateRut(this.value);
  if (res != true) {
    Swal.fire({
      title: "Error",
      text: "El rut ingresado no es valido",
      icon: "error",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Aceptar",
    });
    rutEd.classList.add("is-invalid");
    rutEd.classList.remove("is-valid");
  } else {
    rutEd.classList.remove("is-invalid");
    rutEd.classList.add("is-valid");
  }
});

async function setearModalEditar(elemento) {
  let id = "";
  if (elemento.tagName == "I") {
    id = elemento.parentElement.dataset.id;
  } else {
    id = elemento.dataset.id;
  }
  const response = await fetch(url, {
    method: "POST",
    body: new URLSearchParams({ accion: "buscar", id }),
  });
  const data = await response.json();
  console.log(data);
  idTrabajador.value = data.RUT;
  rutEd.value = $.formatRut(`${data.RUT}${data.DV}`);
  nombreUnoEd.value = data.NOMBRE_UNO;
  nombreDosEd.value = data.NOMBRE_DOS;
  apellidoPaternoEd.value = data.APELLIDO_UNO;
  apellidoMaternoEd.value = data.APELLIDO_DOS;
  nacimientoEd.value = data.NACIMIENTO;
  estadoCivilEd.value = data.CIVIL;
  direccionEd.value = data.DIRECCION;
  emailEd.value = data.EMAIL;
  telefonoEd.value = data.TELEFONO;
  afpEd.value = data.AFP;
  saludEd.value = data.SALUD;
  cargoEd.value = data.CARGO;
  lugarFuncionesEd.value = `${data.LUGAR}, ${data.COMUNA}`;
  nombreFaenaEd.value = data.NOMBRE_FAENA;
  fechaIngresoEd.value = data.CONTRATO;
  horarioEd.value = data.HORARIO;
}

finishBtnEd.addEventListener("click", async function (e) {
  animacionBtn(finishBtnEd, "Actualizando...");

  const rutSinSplitear = rutEd.value.split("-");
  const rutConPuntos = rutSinSplitear[0];
  const dv = rutSinSplitear[1];
  const rutSinPuntos = rutConPuntos.split(".").join("");

  const direccionFaena = lugarFuncionesEd.value.split(",")[0];
  const comunaFaena = lugarFuncionesEd.value.split(",")[1];

  const datos = {
    id: idTrabajador.value,
    rut: rutSinPuntos,
    dv: dv,
    nombreUno: nombreUnoEd.value,
    nombreDos: nombreDosEd.value,
    apellidoUno: apellidoPaternoEd.value,
    apellidoDos: apellidoMaternoEd.value,
    nacimiento: nacimientoEd.value,
    civil: estadoCivilEd.value,
    direccion: direccionEd.value,
    email: emailEd.value,
    telefono: telefonoEd.value,
    afp: afpEd.value,
    salud: saludEd.value,
    cargo: cargoEd.value,
    lugar: direccionFaena,
    comuna: comunaFaena,
    nombreFaena: nombreFaenaEd.value,
    fechaIngreso: fechaIngresoEd.value,
    horario: horarioEd.value,
  };

  console.log(datos);
  const data = new FormData();
  data.append("datos", JSON.stringify(datos));
  data.append("accion", "actualizar");

  const response = await fetch(url, {
    method: "POST",
    body: data,
  });

  const { ESTADO, MOTIVO } = await response.json();

  removerAnimacionBtn(finishBtnEd, "Finalizar");

  Swal.fire({
    title: ESTADO ? "Exito" : "Error",
    text: MOTIVO,
    icon: ESTADO ? "success" : "error",
    showCancelButton: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
  });

  if (ESTADO) {
    limpiarEditar();
    renderizarTabla(await cargarTrabajadores());
  }
});

function limpiarEditar() {
  $("#modalEditarTrabajador").modal("hide");
  $(smartEditar).smartWizard("reset");
  rutEd.value = "";
  nombreUnoEd.value = "";
  nombreDosEd.value = "";
  apellidoPaternoEd.value = "";
  apellidoMaternoEd.value = "";
  nacimientoEd.value = "";
  estadoCivilEd.value = "";
  direccionEd.value = "";
  emailEd.value = "";
  telefonoEd.value = "";
  afpEd.value = "";
  saludEd.value = "";
  cargoEd.value = "";
  lugarFuncionesEd.value = "";
  nombreFaenaEd.value = "";
  fechaIngresoEd.value = "";
  horarioEd.value = "";

  rutEd.classList.remove("is-valid");
  nombreUnoEd.classList.remove("is-valid");
  nombreDosEd.classList.remove("is-valid");
  apellidoPaternoEd.classList.remove("is-valid");
  apellidoMaternoEd.classList.remove("is-valid");
  nacimientoEd.classList.remove("is-valid");
  estadoCivilEd.classList.remove("is-valid");
  direccionEd.classList.remove("is-valid");
  emailEd.classList.remove("is-valid");
  telefonoEd.classList.remove("is-valid");
  afpEd.classList.remove("is-valid");
  saludEd.classList.remove("is-valid");
  cargoEd.classList.remove("is-valid");
  lugarFuncionesEd.classList.remove("is-valid");
  nombreFaenaEd.classList.remove("is-valid");
  fechaIngresoEd.classList.remove("is-valid");
  horarioEd.classList.remove("is-valid");
}

function setearModalImprimir(elemento) {
  let datos;
  if (elemento.tagName == "I") {
    datos = elemento.parentElement.dataset;
  } else {
    datos = elemento.dataset;
  }
  const { id, nombre, lugar } = datos;

  nombreTrabajadorModalImp.innerText = nombre;
  faenaModalImp.innerText = lugar;
  idTrabajadorImp.value = id;
}

btnImprimirDocumentos.addEventListener("click", async function (e) {
  try {
    animacionBtn(btnImprimirDocumentos, "Configurando documentos...");

    let documentos = [];
    tablaDocumentosAImprimir.children[1].children.forEach((elemento) => {
      const check = elemento.children[2].children[0];
      if (check.checked) {
        documentos.push(check.getAttribute("id"));
      }
    });

    if (documentos.length == 0) {
      Swal.fire({
        title: "Error",
        text: "Debe seleccionar al menos un documento",
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar",
      });

      removerAnimacionBtn(btnImprimirDocumentos, "Imprimir");
      return;
    }

    const id = idTrabajadorImp.value;
    const response = await fetch(url, {
      method: "POST",
      body: new URLSearchParams({ accion: "buscar", id }),
    });
    const trabajador = await response.json();

    //tbody

    trabajador["RUT"] = $.formatRut(`${trabajador.RUT}-${trabajador.DV}`);
    trabajador["CONTRATO"] = formatoFecha(trabajador.CONTRATO);
    trabajador["NACIMIENTO"] = formatoFecha(trabajador.NACIMIENTO);
    trabajador["LUGAR"] = `${trabajador.LUGAR}, ${trabajador.COMUNA}`;

    console.log(trabajador);

    localStorage.setItem("trabajador", JSON.stringify(trabajador));

    // window.open("Documentos/", "_blank");

    const data = new FormData();
    data.append("accion", "imprimir");
    data.append("trabajador", JSON.stringify(trabajador));
    data.append("documentos", JSON.stringify(documentos));

    const responseImp = await fetch(url, {
      method: "POST",
      body: data,
    });

    const respuesta = await responseImp.json();
    removerAnimacionBtn(btnImprimirDocumentos, "Imprimir");
    if (respuesta.ESTADO) {
      window.open("Documentos/generarImpresion.php", "_blank");

      Swal.fire({
        title: "Exito",
        text: "Documentos generados correctamente, por favor verifique que la impresora este conectada",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar",
      });

      $("#modalImprimir").modal("hide");
    } else {
      Swal.fire({
        title: "Error",
        text: "No se pudo configurar el documento para imprimir, si el error persiste contácte al administrador",
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar",
      });
    }
  } catch (error) {
    removerAnimacionBtn(btnImprimirDocumentos, "Imprimir");
    Swal.fire({
      title: "Error",
      text: "No se pudo configurar el documento para imprimir, si el error persiste contácte al administrador",
      icon: "error",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Aceptar",
    });
  }
});

function configurarBtns(trabajador, ROL) {
  let btns = "";
  if (ROL == "ADMINISTRADOR") {
    if (trabajador.ESTADO == "ACTIVO") {
      btns += `
      <button type="button" class="btn btn-primary Editar" data-toggle="modal" data-id="${trabajador.RUT}" data-target="#modalEditarTrabajador">
      <i class="fa fa-edit"></i>
    </button>
  
    <button type="button" class="btn btn-success Imprimir" data-toggle="modal" data-nombre="${trabajador.NOMBRE}" data-lugar="${trabajador.LUGAR}" data-id="${trabajador.RUT}"  data-target="#modalImprimir">
      <i class="fa fa-print"></i>
    </button>
        <button type="button" class="btn btn-danger Eliminar" data-id="${trabajador.RUT}">
          <i class="fa fa-trash"></i>
        </button>`;
    } else {
      btns += `
        <button type="button" class="btn btn-success Activar" data-id="${trabajador.RUT}">
          <i class="fa fa-check"></i>
        </button>`;
    }
  } else {
    if (trabajador.ESTADO == "ACTIVO") {
      btns += `<button type="button" class="btn btn-primary Editar" data-toggle="modal" data-id="${trabajador.RUT}" data-target="#modalEditarTrabajador">
        <i class="fa fa-edit"></i>
      </button>
    
      <button type="button" class="btn btn-success Imprimir" data-toggle="modal" data-nombre="${trabajador.NOMBRE}" data-lugar="${trabajador.LUGAR}" data-id="${trabajador.RUT}"  data-target="#modalImprimir">
        <i class="fa fa-print"></i>
      </button>`;
    }
  }

  return btns;
}
