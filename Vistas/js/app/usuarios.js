import { crearDATATABLE, LimpiarDataTable } from "../helpers/funciones.js";

$(window).ready(function () {
  renderizarUsuarios();
});

async function cargarUsuarios() {
  const response = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: new URLSearchParams({ accion: "listarUsers" }),
  });

  const result = await response.json();
  console.log(result);
  return result;
}

async function renderizarUsuarios() {
  LimpiarDataTable('tabla')
  const usuarios = await cargarUsuarios();

  $("#tabla tbody").empty();

  let tbody = document.querySelector("#tabla tbody");

  usuarios.forEach(({ ID, ROL, USER, ESTADO, FOTO }, index) => {
    let tr = document.createElement("tr");

    tr.innerHTML = ` 
    <td>${index + 1}</td>
    <td>${USER}</td>
    <td><img src="${
      FOTO == "" ? "Vistas/img/users/usersDefault.png" : FOTO
    }" style="width:90px"></td>
    <td>${ROL}</td>
    <td>${ESTADO}</td>
    <td>

    <button class="btn btn-warning btn-sm Editar" data-toggle="modal" data-target="#Editar" idUsuario="${ID}"><i class="fas fa-edit"></i></button>

    ${
      ESTADO == "HABILITADO"
        ? '<button class="btn btn-danger btn-sm Desactivar" idUsuario="' +
          ID +
          '"><i class="fas fa-times"></i></button>'
        : '<button class="btn btn-success btn-sm Activar" idUsuario="' +
          ID +
          '"><i class="fas fa-check"></i></button>'
    }                 

    <button class="btn btn-primary btn-sm ResetPwd" idUsuario="${ID}"><i class="fa fa-key" aria-hidden="true"></i></button>

    </td>
    `;

    tbody.appendChild(tr);
  });

  crearDATATABLE('tabla',null, 'Usuarios', 5, false);
}

//SETEAR USUARIO
$(".TB").on("click", ".Editar", async function () {
  const idUsuario = $(this).attr("idUsuario");
  console.log(idUsuario);
  const usuarios = await cargarUsuarios();

  const { ID, ROL, USER, FOTO } = usuarios.find((user) => user.ID == idUsuario);

  document.querySelector("#idUsuario").value = ID;
  document.querySelector("#userE").value = USER;
  document.querySelector("#rolE").value = ROL;
  document.querySelector("#imgActualEd").value = FOTO;

  console;

  const imgActual = document.querySelector("#imgActual");
  imgActual.src = FOTO == "" ? "Vistas/img/users/usersDefault.png" : FOTO;
  imgActual.classList.add("img-thumbnail");
});

//DESHABILITAR USUARIO
$(".TB").on("click", ".Desactivar", async function () {
  const idUsuario = $(this).attr("idUsuario");

  const texto = "Al desactivar el usuario ya no podrá ingresar al sistema";
  const { isDenied, isDismissed } = await validarAcciones(texto);

  if (isDenied || isDismissed) {
    return;
  }

  const response = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: new URLSearchParams({
      accion: "cambiarEstado",
      estado: "deshabilitar",
      idUsuario: idUsuario,
    }),
  });

  const result = await response.json();
  console.log(result);
  if (result) {
    Swal.fire({
      icon: "success",
      title: "Usuario Deshabilitado",
      text: "El usuario ha sido deshabilitado",
    });
    renderizarUsuarios();
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "No se pudo deshabilitar el usuario",
    });
  }
});

//HABILITAR USUARIO
$(".TB").on("click", ".Activar", async function () {
  const idUsuario = $(this).attr("idUsuario");
  console.log(idUsuario);

  const response = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: new URLSearchParams({
      accion: "cambiarEstado",
      estado: "habilitar",
      idUsuario: idUsuario,
    }),
  });

  const result = await response.json();
  console.log(result);
  if (result) {
    Swal.fire({
      icon: "success",
      title: "Usuario Habilitado",
      text: "El usuario ha sido habilitado exitosamente",
    });
    renderizarUsuarios();
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "No se pudo habilitar el usuario",
    });
  }
});

//RESET PASS A DEFAULT
$(".TB").on("click", ".ResetPwd", async function () {
  const idUsuario = $(this).attr("idUsuario");
  console.log(idUsuario);

  const texto =
    "Al resetar la contraseña quedará la contraseña por defecto 1234";
  const { isDenied, isDismissed } = await validarAcciones(texto);

  if (isDenied || isDismissed) {
    return;
  }

  const response = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: new URLSearchParams({
      accion: "resetPwd",
      idUsuario: idUsuario,
    }),
  });

  const result = await response.json();
  console.log(result);
  if (result) {
    Swal.fire({
      icon: "success",
      title: "Contraseña Reseteada",
      text: "La contraseña se ha reseteado con exito",
    });
    renderizarUsuarios();
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "No se pudo resetear la contraseña",
    });
  }
});

async function validarAcciones(texto) {
  const respuesta = Swal.fire({
    title: "¿Estas seguro?",
    text: texto,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, estoy seguro",
    cancelButtonText: "Cancelar",
  });
  return respuesta;
}

//CREAR USUARIO
const formCrear = document.querySelector("#formUsuarioCrear");
formCrear.addEventListener("submit", async function (e) {
  e.preventDefault();

  const data = new FormData(formCrear);
  data.append("accion", "crearUsuario");

  data.forEach((value, key) => {
    console.log(`${key}: ${value}`);
  });

  const respon = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: data,
  });

  const { Estado, Motivo } = await respon.json();

  if (Estado) {
    Swal.fire({
      icon: "success",
      title: "Usuario Creado",
      text: Motivo,
    });
    renderizarUsuarios();
    formCrear.reset();
  } else {
    console.log(Motivo);
    Swal.fire({
      icon: "error",
      title: "Error",
      text: Motivo,
    });
  }
});

//CREAR ACTUALIZAR USUARIOS

const formActualizar = document.querySelector("#formUsuarioEditar");
formActualizar.addEventListener("submit", async function (e) {
  e.preventDefault();

  const data = new FormData(formActualizar);
  data.append("accion", "actualizarUsuario");

  const respon = await fetch("Controladores/usuariosA.php", {
    method: "POST",
    body: data,
  });

  const { Estado, Motivo } = await respon.json();

  if (Estado) {
    Swal.fire({
      icon: "success",
      title: "Usuario Actualizado",
      text: Motivo,
    });
    renderizarUsuarios();
    formActualizar.reset();
    $("#Editar").modal("toggle");
  } else {
    console.log(Motivo);
    Swal.fire({
      icon: "error",
      title: "Error",
      text: Motivo,
    });
  }
});

function validarDatos(usuario) {
  if (usuario.pwd1 == "" || usuario.user == "" || usuario.rol == 0) {
    return { Estado: false, Motivo: "Revise los datos obligatorios" };
  } else if (usuario.pwd1 != usuario.pwd2) {
    return { Estado: false, Motivo: "Contraseña No coincide" };
  } else if (usuario.pwd1.length < 4) {
    return {
      Estado: false,
      Motivo: "Contraseña debe tener un minimo de 4 caracteres",
    };
  } else {
    return { Estado: true, Motivo: "ok" };
  }
}
