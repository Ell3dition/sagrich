export {
  formatoFecha,
  crearDATATABLE,
  is_numeric,
  LimpiarDataTable,
  vercontraseña,
  exportTableToExcel,
  animacionBtn,
  removerAnimacionBtn
};

//FORMATEAR FECHA
function formatoFecha(fecha) {
  const meses = [
    'ENE',
    'FEB',
    'MAR',
    'ABR',
    'MAY',
    'JUN',
    'JUL',
    'AGO',
    'SEP',
    'OCT',
    'NOV',
    'DIC',
  ];

  let fechaSplit = fecha.split('-');
  let numeroMes = fechaSplit[1];
  let nombreMes = meses.filter((mes, i) => {
    if ((numeroMes-1) == i) {
      return mes;
    }
  });
  {
  }
  return `${fechaSplit[2]} ${nombreMes[0]} ${fechaSplit[0]}`;
}

//VALIDAR SI ES NUMERO O NO
function is_numeric(value) {
  return !isNaN(parseFloat(value)) && isFinite(value);
}

function LimpiarDataTable(idTabla) {
  let tabla = $('#' + idTabla).DataTable();
 
  if (tabla != null) {
    tabla.clear();
    tabla.destroy();
  }
}

//CREAR DATATABLE
function crearDATATABLE(idTabla, title, filename, page = 20) {
$('#' + idTabla).DataTable({
    pageLength : page,
    language: {
      decimal: '',
      emptyTable: 'No hay información',
      info: 'Mostrando _START_ a _END_ de _TOTAL_ Entradas',
      infoEmpty: 'Mostrando 0 de 0 Entradas',
      infoFiltered: '(Filtrado de _MAX_ total entradas)',
      infoPostFix: '',
      thousands: ',',
      lengthMenu: 'Mostrar _MENU_ Entradas',
      loadingRecords: 'Cargando...',
      processing: 'Procesando...',
      search: 'Buscar:',
      zeroRecords: 'Sin resultados encontrados',
      paginate: {
        first: 'Primero',
        last: 'Ultimo',
        next: 'Siguiente',
        previous: 'Anterior',
      },
    },

    dom: 'Bfrtip',
    
    buttons: {
      dom: {
        button: {
          className: 'btn',
        },
      },
   
      buttons: [
        {
          extend: 'excelHtml5',
          footer: true,
          title: null,
          filename: filename,
          //definimos estilos del boton de excel
          extend: 'excel',
          text: 'Exportar a Excel',
          className: 'btn btn-warning',

          excelStyles: [
            {
              template: ['blue_medium', 'header_green', 'title_medium'],
            },

            {
              cells: 'sh',
              style: {
                font: {
                  size: 14,
                  b: false,
                },
                fill: {
                  pattern: {
                    color: '1C3144',
                  },
                },
              },
            },
          ],
        },
      ],
    },

    
  });


  
}



//VER CONTRASEÑAS EN LOS INPUTS
function vercontraseña(idIconEye, idInputPass) {
  const iconEye = document.getElementById(idIconEye);
  const inputPass = document.getElementById(idInputPass);
  iconEye.addEventListener('click', function (e) {
    const type =
      inputPass.getAttribute('type') === 'password' ? 'text' : 'password';
    inputPass.setAttribute('type', type);

    this.classList.toggle('fa-eye-slash');
  });
}

//EXPORTAR EXCEL
function exportTableToExcel(tableID, filename = 'reporte.xls'){
  
  const tabla = document.getElementById(tableID);

  Exporter.export(tabla, filename+'.xls');
 
}

//ANIMACION BOTON BUSCAR REGISTROS

function animacionBtn(btn, texto ){

  let spanSpinner = document.createElement('SPAN');
  spanSpinner.classList.add('spinner-grow','spinner-grow-sm');
  spanSpinner.setAttribute('role','status');
  spanSpinner.setAttribute('aria-hidden','true');

  let spanText = document.createElement('SPAN');
  spanText.textContent = ` ${texto}`;

  btn.textContent = "";
  btn.appendChild(spanSpinner);
  btn.appendChild(spanText);
  btn.setAttribute('disabled', true);
}

function removerAnimacionBtn(btn, texto){
  btn.removeAttribute('disabled');
  btn.textContent = texto;
}


