import {
  vercontraseña,
  is_numeric,
  animacionBtn,
  removerAnimacionBtn,
} from "../helpers/funciones.js";
inactivityTime();
$(document).ready(function () {
  vercontraseña("pasEye", "passActual");
  vercontraseña("pasEyeNueva", "passNueva");
  vercontraseña("pasEyeRep", "passRep");

  
});

$("#btnActualizarPass").click(function () {
  let passActual = document.getElementById("passActual");
  let passNueva = document.getElementById("passNueva");
  let passRep = document.getElementById("passRep");

  const data = new FormData();
  data.append("passActual", passActual.value);
  data.append("passNueva", passNueva.value);
  data.append("passRep", passRep.value);
  data.append("origen", "menu");
  data.append("accion", "cambiarPass");

  animacionBtn(this, "Actualizando...");

  fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: data,
  })
    .then(function (res) {
      console.log(res);
      if (res.ok) {
        return res.json();
      } else {
        throw "Error Llamada";
      }
    })
    .then((respuesta) => {
      console.log(respuesta);
      removerAnimacionBtn(this, "Actualizar");
      if (is_numeric(respuesta)) {
        $("#cambioPass").modal("hide");
        passActual.value = "";
        passNueva.value = "";
        passRep.value = "";
        Swal.fire({
          title: "Felicidades",
          text: "La contraseña fue actualizada con éxito",
          icon: "success",
        });

        setTimeout(() => {
          window.location = "salir";
        }, 2000);
      } else {
        Swal.fire({
          title: "Error",
          text: respuesta.Motivo,
          icon: "error",
        });
      }
    })
    .catch((err) => {
      removerAnimacionBtn(this, "Actualizar");
      console.log(err);
    });
});

const formEditar = document.getElementById("formEditarPerfil");
formEditar.addEventListener("submit", async function (e) {
  e.preventDefault();

  const data = new FormData(formEditar);
  data.append("accion", "editarPerfil");

  const response = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: data,
  });

  const {Estado, Motivo}= await response.json();


  if (Estado) {
    Swal.fire({
      title: "Felicidades",
      text: Motivo,
      icon: "success",
    });

    setTimeout(() => {
      window.location = "salir";
    }, 2000);
  } else {
    Swal.fire({
      title: "Error",
      text: Motivo,
      icon: "error",
    });
  }
});

const salir = document.getElementById("salir");
salir.addEventListener("click", async function () {
  const response = await Swal.fire({
    title: "¡Atención!",
    text: "¿Desea Salir del Sistema?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Si, Salir",
    cancelButtonText: "No, Mantenerme",
   
  });
console.log(response);
  if (response.isConfirmed) {
    localStorage.clear();
    window.location = "salir";
  }
});

 function inactivityTime () {
  let time;
  window.onload = resetTimer;
  // DOM Events
  document.onmousemove = resetTimer;
  document.onkeypress = resetTimer;

  function logout() {
    const response = Swal.fire({
      title: "¡Atención!",
      text: "Su Sesión se cerrará por inactividad",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Salir",
      cancelButtonText: "No, Mantenerme",


    });

    TimeoutPromise(response, 300000 ) // 5 minutos
      .then(() => {
        response.then((value) => {
          if (value.isConfirmed) {
            window.location = "salir";
          }
        });
      })
      .catch(() => (window.location = "salir"));
  }

  function resetTimer() {
    clearTimeout(time);
    time = setTimeout(logout, 1800000); // 1800000ms = 30 minutos
  }

  const TimeoutPromise = (pr, timeout) =>
    Promise.race([pr, new Promise((_, rej) => setTimeout(rej, timeout))]);
};
