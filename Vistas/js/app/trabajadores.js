import {
  crearDATATABLE,
  crearSmartWizard,
  animacionBtn,
  removerAnimacionBtn,
} from "../helpers/funciones.js";
import { validarInputs, validarSteepDos } from "./trabajadores/validaciones.js";

document.addEventListener("click", function (e) {
  if (
    e.target.className == "btn btn-danger Eliminar" ||
    e.target.className == "fa fa-trash"
  ) {
    eliminarTrabajador();
  }
});

async function eliminarTrabajador() {
  const confirmacion = await Swal.fire({
    title: "¿Estás seguro?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    cancelButtonColor: "#3085d6",
    confirmButtonColor: "#d33",

    confirmButtonText: "¡Sí, eliminar!",
  });
}

document.addEventListener("DOMContentLoaded", function (e) {
  crearDATATABLE("tabla-trabajadores", null, "trabajadores", 10, false);
  crearSmartWizard("smartCrear");
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
const fechaIngresoN = document.getElementById("fechaIngresoN");
const horarioN = document.getElementById("horarioN");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const finishBtn = document.getElementById("finishBtn");
const url = 'Controladores/trabajadoresC.php';

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
        const datos = [cargoN, lugarFuncionesN, fechaIngresoN, horarioN];
        const result = validarInputs(datos);
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

finishBtn.addEventListener("click", async function (e) {
  animacionBtn(finishBtn, "Guardando...");
  const datos = {
    rut: rutN.value,
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
    lugar: lugarFuncionesN.value,
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

  const result = await response.json();
  console.log(result);
  removerAnimacionBtn(finishBtn, "Finalizar Registro");
});
