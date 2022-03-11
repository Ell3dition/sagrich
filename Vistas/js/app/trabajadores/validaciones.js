const validarInputs = (datos) => {
  let contador = 0;
  datos.forEach((input) => {
    if (input.value == "") {
      contador++;
      input.classList.add("is-invalid");
      input.classList.remove("is-valid");
    } else {
      input.classList.remove("is-invalid");
      input.classList.add("is-valid");
    }
  });
  return contador == 0 ? true : false;
};

const validarSteepDos = (datos) => {
  let contador = 0;
  datos.forEach((input) => {
    if (input.value == "") {
      contador++;
      input.classList.add("is-invalid");
      input.classList.remove("is-valid");
    } else {
      input.classList.remove("is-invalid");
      input.classList.add("is-valid");
    }
  });

  //validar email
  const [emailN] = datos;
  const regex =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

  if (!regex.test(emailN.value)) {
    contador++;
    emailN.classList.add("is-invalid");
    emailN.classList.remove("is-valid");
  } else {
    emailN.classList.remove("is-invalid");
    emailN.classList.add("is-valid");
  }

  return contador == 0 ? true : false;
};

export { validarInputs, validarSteepDos };
