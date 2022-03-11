<?php
if (!isset($_SESSION)) {
    session_start();
}


include "../Modelos/trabajadoresM.php";

class TrabajadoresC
{


    function guardarTrabajadorC()
    {
        $datos = json_decode($_POST['datos'], true);

        //VALIDAR QUE LOS DATOS NO VENGAN VACIOS
        if (
            empty($datos["rut"]) || empty($datos["nombreUno"]) || empty($datos["nombreDos"])
            || empty($datos["apellidoUno"]) || empty($datos["apellidoDos"])
            || empty($datos["nacimiento"]) || empty($datos["civil"])
            || empty($datos["direccion"]) || empty($datos["telefono"]) || empty($datos["email"])
            || empty($datos["afp"]) || empty($datos["salud"]) || empty($datos["cargo"]) || empty($datos["lugar"])
            || empty($datos["fechaIngreso"]) || empty($datos["horario"])
        ) {
            echo json_encode(array("ESTADO" => false, "MOTIVO" => "Faltan datos obligatorios". $datos["nombreDos"] ));
           return;
        }

        //VALIDAR FORMATO EMAIL
        

        echo json_encode(array("DATA" => $datos, "DOS" => $datos["nombreDos"]));
    }
}

if ($_POST['accion'] == 'guardar') {

    $trabajador = new TrabajadoresC();
    $trabajador->guardarTrabajadorC();
}
