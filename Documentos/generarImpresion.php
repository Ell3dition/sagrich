<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["Ingreso"]) && $_SESSION["Ingreso"]  == TRUE) {

  if (isset($_SESSION["documentos"])) {
    $documentos = $_SESSION["documentos"];
  } else {
    echo '<h1>Hubo un problema al generar el documento si el problema persiste contácte al soporte</h1>';
    exit();
  }
} else {
  echo '<h1>No tiene permisos para ver esta pagina si considera que existe un error contácte al soporte</h1>';
  exit();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sagrich</title>
  <link rel="stylesheet" href="configuracionDocumentos.css" />

</head>
<STYLE>
  .SaltoDePagina {
    page-break-before: always;
  }
</STYLE>


<body>
 
<?php

  $totalDocumentos = count($documentos);
  $contador = 0;

  foreach ($documentos as $documento) {
      include_once './' . $documento . '.php';    
      $contador++;
      if ($contador < $totalDocumentos) {
          echo '<div class="SaltoDePagina"></div>';
      }
  }

?>


  <script>
    const rutTrabajador = document.querySelectorAll(".rutTrabajador");
    const nombreTrabajador = document.querySelectorAll(".nombreTrabajador");
    const nacimientoTrabajador = document.querySelectorAll(".nacimientoTrabajador");
    const estadoCivilTrabajador = document.querySelectorAll(".estadoCivilTrabajador");
    const domicilioTrabajador = document.querySelectorAll(".domicilioTrabajador");
    const emailTrabajador = document.querySelectorAll(".emailTrabajador");
    const telefonoTrabajador = document.querySelectorAll(".telefonoTrabajador");
    const afpTrabajador = document.querySelectorAll(".afpTrabajador");
    const saludTrabajador = document.querySelectorAll(".saludTrabajador");
    const cargoTrabajador = document.querySelectorAll(".cargoTrabajador");
    const lugarTrabajador = document.querySelectorAll(".lugarTrabajador");
    const horarioTrabajador = document.querySelectorAll(".horarioTrabajador");
    const fechaContrato = document.querySelectorAll(".contratoTrabajador");

    const comunaFaena = document.querySelectorAll(".comunaFaena");
    const nombreFaenaTrabajador = document.querySelectorAll(".nombreFaenaTrabajador");

    const trabajador = JSON.parse(localStorage.getItem("trabajador"));
    const empresaSeleccionada = localStorage.getItem("empresaSeleccionada")
    const listEmpresa = JSON.parse(localStorage.getItem("empresas")) || []
    const empresa = listEmpresa.find((item)=> item.RUT === empresaSeleccionada)

    // SETEAR DATOS EMPRESA

    const direccionEmpresa = document.querySelectorAll(".direccionEmpresa")
    const emailEmpresa = document.querySelectorAll(".emailEmpresa")
    const nombreEmpresa = document.querySelectorAll(".nombreEmpresa")
    const representanteEmpresa = document.querySelectorAll(".representanteEmpresa")
    const rutEmpresa = document.querySelectorAll(".rutEmpresa")
    const rutRepresentanteEmpresa = document.querySelectorAll(".rutRepresentanteEmpresa")


    direccionEmpresa.forEach((element) => {
      element.innerText = empresa.DIRECCION;
    });

    emailEmpresa.forEach((element) => {
      element.innerText = empresa.EMAIL;
    });

    nombreEmpresa.forEach((element) => {
      element.innerText = empresa.NOMBRE;
    });

    representanteEmpresa.forEach((element) => {
      element.innerText = empresa.REPRESENTANTE;
    });

    rutEmpresa.forEach((element) => {
      element.innerText = empresa.RUT;
    });

    rutRepresentanteEmpresa.forEach((element) => {
      element.innerText = empresa.RUT_REPRESENTANTE;
    });

    //SETEAR VALORES

    rutTrabajador.forEach((element) => {
      element.innerText = trabajador.RUT;
    });

    nombreTrabajador.forEach((element) => {
      element.innerText = trabajador.NOMBRE_UNO + " " + trabajador.NOMBRE_DOS + " " + trabajador.APELLIDO_UNO + " " + trabajador.APELLIDO_DOS;
    });

    nacimientoTrabajador.forEach((element) => {
      element.innerText = trabajador.NACIMIENTO;
    });

    estadoCivilTrabajador.forEach((element) => {
      element.innerText = trabajador.CIVIL;
    });

    domicilioTrabajador.forEach((element) => {
      element.innerText = trabajador.DIRECCION;
    });

    emailTrabajador.forEach((element) => {
      element.innerText = trabajador.EMAIL;
    });

    telefonoTrabajador.forEach((element) => {
      element.innerText = trabajador.TELEFONO;
    });

    afpTrabajador.forEach((element) => {
      element.innerText = trabajador.AFP;
    });

    saludTrabajador.forEach((element) => {
      element.innerText = trabajador.SALUD;
    });

    cargoTrabajador.forEach((element) => {
      element.innerText = trabajador.CARGO;
    });

    lugarTrabajador.forEach((element) => {
      element.innerText = trabajador.LUGAR;
    });

    horarioTrabajador.forEach((element) => {
      element.innerText = trabajador.HORARIO;
    });

    fechaContrato.forEach((element) => {
      element.innerText = trabajador.CONTRATO;
    });

    comunaFaena.forEach((element) => {
      element.innerText = trabajador.COMUNA;
    });


    nombreFaenaTrabajador.forEach((element) => {
      element.innerText = trabajador.NOMBRE_FAENA;
    });

    

    window.print();

    setTimeout(() => {
      window.close();
    }, 2000);
  </script>

</body>

</html>



