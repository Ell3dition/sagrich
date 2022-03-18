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
            || empty($datos["fechaIngreso"]) || empty($datos["horario"]) || empty($datos["nombreFaena"])
        ) {
            echo json_encode(array("ESTADO" => false, "MOTIVO" => "Faltan datos obligatorios" . $datos["nombreDos"]));
            return;
        }

        //VALIDAR FORMATO EMAIL
        if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array("ESTADO" => false, "MOTIVO" => "Formato de email incorrecto"));
            return;
        }

        //VALIDAR QUE EL RUT NO EXISTA

        $trabajador = TrabajadoresM::buscarTrabajadorM($datos["rut"]);
        if ($trabajador != null) {
            echo json_encode(array("ESTADO" => false, "MOTIVO" => "El rut ya existe"));
            return;
        }

        //Guardar Datos

        $respuesta = TrabajadoresM::guardarTrabajadorM($datos);

        echo json_encode($respuesta);
    }


    function listarTrabajadoresC()
    {
        $condicion = $_POST['todos'] == "todos" ? "" : "WHERE ESTADO = 'ACTIVO'";

      

        $respuesta = TrabajadoresM::listarTrabajadoresM($condicion);
        echo json_encode(array("TRABAJADORES" => $respuesta, "ROL" => $_SESSION["rol"]));
    }

    function cambiarEstadoTrabajadorC()
    {
        $rut = $_POST["id"];
        //DIVIDIR RUT
        $rut = explode("-", $rut);

        $estado = $_POST["estado"] == "ACTIVAR" ? "ACTIVO" : "DESHABILITADO";

        $respuesta = TrabajadoresM::cambiarEstadoTrabajadorM($rut[0], $estado);
        echo json_encode($respuesta);
    }

    function buscarTrabajadorByIdC(){

        $rut = $_POST["id"];
        //DIVIDIR RUT
        $rut = explode("-", $rut);

        $respuesta = TrabajadoresM::buscarTrabajadorByIdM($rut[0]);
        echo json_encode($respuesta);


    }

    function actualizarTrabajadorC(){

        $datos = json_decode($_POST['datos'], true);

        //VALIDAR QUE LOS DATOS NO VENGAN VACIOS
        if (
            empty($datos["rut"]) || empty($datos["nombreUno"]) || empty($datos["nombreDos"])
            || empty($datos["apellidoUno"]) || empty($datos["apellidoDos"])
            || empty($datos["nacimiento"]) || empty($datos["civil"])
            || empty($datos["direccion"]) || empty($datos["telefono"]) || empty($datos["email"])
            || empty($datos["afp"]) || empty($datos["salud"]) || empty($datos["cargo"]) || empty($datos["lugar"])
            || empty($datos["fechaIngreso"]) || empty($datos["horario"]) || empty($datos["nombreFaena"])
        ) {
            echo json_encode(array("ESTADO" => false, "MOTIVO" => "Faltan datos obligatorios" . $datos["nombreDos"]));
            return;
        }

        //VALIDAR FORMATO EMAIL
        if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array("ESTADO" => false, "MOTIVO" => "Formato de email incorrecto"));
            return;
        }

        //VALIDAR QUE EL RUT NO EXISTA

        $trabajador = TrabajadoresM::buscarTrabajadorM($datos["rut"]);
        if ($trabajador != null) {

            if($trabajador["RUT_TRABAJADOR"] != $datos["id"]){
                echo json_encode(array("ESTADO" => false, "MOTIVO" => "El rut ya existe"));
                return;
            }

         
        }

        //Guardar Datos

        $respuesta = TrabajadoresM::actualizarTrabajadorM($datos);

        echo json_encode($respuesta);



    }


    function imprimirC(){
    
        $documento = json_decode($_POST["documentos"], true);
        $_SESSION["documentos"] = $documento;

        echo json_encode(array("ESTADO" => true));


    }

}

if ($_POST['accion'] == 'guardar') {

    $trabajador = new TrabajadoresC();
    $trabajador->guardarTrabajadorC();
}else if($_POST['accion'] == 'listar') {

    $trabajador = new TrabajadoresC();
    $trabajador->listarTrabajadoresC();
}else if($_POST['accion'] == 'cambiarEstado') {

    $trabajador = new TrabajadoresC();
    $trabajador->cambiarEstadoTrabajadorC();
}else if($_POST['accion'] == 'buscar') {

    $trabajador = new TrabajadoresC();
    $trabajador->buscarTrabajadorByIdC();
}else if($_POST['accion'] == 'actualizar') {

    $trabajador = new TrabajadoresC();
    $trabajador->actualizarTrabajadorC();
}else if($_POST['accion'] == 'imprimir') {

    $trabajador = new TrabajadoresC();
    $trabajador->imprimirC();
}
