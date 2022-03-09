

import {
    vercontraseña,
    is_numeric,
    animacionBtn,
    removerAnimacionBtn,
  } from "../helpers/funciones.js";
  $(document).ready(function () {
    vercontraseña("pasEye", "passActual");
    vercontraseña("pasEyeNueva", "passNueva");
    vercontraseña("pasEyeRep", "passRep");

    $('#cambioPass').modal({backdrop: 'static', keyboard: false})
    $('#cambioPass').modal('show')

    const btnCerrarCruzModal = document.getElementById("btnCruzModal");
    const btnCancelarModal = document.getElementById("btnCancelarModal");
    btnCerrarCruzModal.removeAttribute("data-dismiss");
    btnCancelarModal.removeAttribute("data-dismiss");
    btnCerrarCruzModal.style.display = "none";
    btnCancelarModal.style.display = "none";

    const contenedorPassActual = document.getElementById("contenedorPassActual");
    contenedorPassActual.style.display = "none";

    const leyenda = document.querySelector('#LeyendaPassDefault');

    leyenda.textContent = "La contraseña que ha ingresado es la contraseña por defecto, por motivos de seguridad debe cambiar la contraseña";

    leyenda.style.display = "block";
  
  });
  

  $("#btnActualizarPass").click(function () {
    
    let passNueva = document.getElementById("passNueva");
    let passRep = document.getElementById("passRep");
  
    const data = new FormData();
    
    data.append("origen", "verificacionInicio");
    data.append("passNueva", passNueva.value);
    data.append("passRep", passRep.value);
    data.append("accion", "cambiarPass");
  
    animacionBtn(this, "Actualizando...");
  
    fetch("Controladores/usuariosA.php", {
      method: "POST",
      body: data,
    })
      .then(function (res) {
       if (res.ok) {
          return res.json();
        } else {
          throw "Error Llamada";
        }
      })
      .then((respuesta) => {
        removerAnimacionBtn(this, "Actualizar");
        if (is_numeric(respuesta)) {
          $("#cambioPass").modal("hide");
          passActual.value = "";
          passNueva.value = "";
          passRep.value = "";
          swal({
            title: "Felicidades",
            text: "La contraseña fue actualizada con éxito",
            icon: "success",
          });
  
          setTimeout(() => {
            window.location = "salir";
          }, 2000);
        } else {
          swal({
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