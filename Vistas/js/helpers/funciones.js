export {
  formatoFecha,
  crearDATATABLE,
  is_numeric,
  LimpiarDataTable,
  vercontraseña,
  exportTableToExcel,
  animacionBtn,
  removerAnimacionBtn,
  crearSmartWizard,
};

//FORMATEAR FECHA
function formatoFecha(fecha) {

  const meses = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ];

  let fechaSplit = fecha.split("-");
  let numeroMes = fechaSplit[1];
  let nombreMes = meses.filter((mes, i) => {
    if (numeroMes - 1 == i) {
      return mes;
    }
  });
  {
  }
  return `${fechaSplit[2]} de ${nombreMes[0]} de ${fechaSplit[0]}`;
}

//VALIDAR SI ES NUMERO O NO
function is_numeric(value) {
  return !isNaN(parseFloat(value)) && isFinite(value);
}

function LimpiarDataTable(idTabla) {
  let tabla = $("#" + idTabla).DataTable();

  if (tabla != null) {
    tabla.clear();
    tabla.destroy();
  }
}

//CREAR DATATABLE
function crearDATATABLE(
  idTabla,
  title = null,
  filename,
  page = 20,
  footer = false
) {
  $("#" + idTabla).DataTable({
    pageLength: page,
    language: {
      decimal: "",
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      infoEmpty: "Mostrando 0 de 0 Entradas",
      infoFiltered: "(Filtrado de _MAX_ total entradas)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Entradas",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscar:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Ultimo",
        next: "Siguiente",
        previous: "Anterior",
      },
    },

    dom: "Bfrtip",

    buttons: {
      dom: {
        button: {
          className: "btn",
        },
      },

      buttons: [
        {
          exportOptions: {
            columns: ":not(.no-exportar)",
          },
          extend: "excelHtml5",
          footer: footer,
          title: title,
          filename: filename,
          sheetName: "Reporte",
          //definimos estilos del boton de excel
          extend: "excel",
          text: "Exportar a Excel",
          className: "btn btn-warning btn-sm mb-2 d-flex",

          excelStyles: [
            {
              template: ["blue_medium", "header_green", "title_medium"],
            },

            {
              cells: "sh",
              style: {
                font: {
                  size: 14,
                  b: false,
                },
                fill: {
                  pattern: {
                    color: "1C3144",
                  },
                },
              },
            },
          ],
        },
      ],
    },
  });

  //ESTILOS INPUT BUSCAR DATATABLE
  const contenedor = document.querySelector(".dataTables_filter");
  const input = document.querySelector(".dataTables_filter input");

  contenedor.classList.add("d-md-block", "d-flex");
  input.style.borderRadius = "20px";
  input.classList.add("mt-2");
}

//VER CONTRASEÑAS EN LOS INPUTS
function vercontraseña(idIconEye, idInputPass) {
  const iconEye = document.getElementById(idIconEye);
  const inputPass = document.getElementById(idInputPass);
  iconEye.addEventListener("click", function (e) {
    const type =
      inputPass.getAttribute("type") === "password" ? "text" : "password";
    inputPass.setAttribute("type", type);

    this.classList.toggle("fa-eye-slash");
  });
}

//EXPORTAR EXCEL
function exportTableToExcel(tableID, filename = "reporte.xls") {
  const tabla = document.getElementById(tableID);

  Exporter.export(tabla, filename + ".xls");
}

//ANIMACION BOTON BUSCAR REGISTROS

function animacionBtn(btn, texto) {
  let spanSpinner = document.createElement("SPAN");
  spanSpinner.classList.add("spinner-grow", "spinner-grow-sm");
  spanSpinner.setAttribute("role", "status");
  spanSpinner.setAttribute("aria-hidden", "true");

  let spanText = document.createElement("SPAN");
  spanText.textContent = ` ${texto}`;

  btn.textContent = "";
  btn.appendChild(spanSpinner);
  btn.appendChild(spanText);
  btn.setAttribute("disabled", true);
}

function removerAnimacionBtn(btn, texto) {
  btn.removeAttribute("disabled");
  btn.textContent = texto;
}

function crearSmartWizard(idWizard) {
  $("#" + idWizard).smartWizard({
    selected: 0,
    theme: "progress",
    enableURLhash: false,
    autoAdjustHeight: false,
    removeDoneStepOnNavigateBack: true,
    lang: {
      // Language variables for button
      next: "Siguiente",
      previous: "Anterior",
    },
    transition: {
      animation: "none", // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: "400", // Transion animation speed
      // Transition animation easing. Not supported without a jQuery easing plugin
    },
    toolbarSettings: {
      toolbarPosition: "none", // none, top, bottom, both
    },
    anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: false, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true, // Enable/Disable the done steps navigation
    },
    keyboardSettings: {
      keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
    },
  });
}
