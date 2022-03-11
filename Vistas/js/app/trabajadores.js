import { crearDATATABLE, crearSmartWizard } from "../helpers/funciones.js";

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

    crearDATATABLE("tabla-trabajadores",null, "trabajadores", 10, false);
    crearSmartWizard("smartCrear");

})

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


prevBtn.addEventListener("click", function (e) {
  e.preventDefault();
  $(smartCrear).smartWizard("prev");
})

nextBtn.addEventListener("click", function (e) {
  e.preventDefault();
  $(smartCrear).smartWizard("next");
})

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

