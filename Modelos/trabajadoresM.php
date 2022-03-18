<?php

require_once 'conexionBD.php';


class TrabajadoresM extends ConexionBD
{


    static function guardarTrabajadorM($trabajador)
    {

        $query = "INSERT INTO TRABAJADORES VALUES (:RUT, :DV, :NOMBRE_UNO, :NOMBRE_DOS, :APELLIDO_UNO, :APELLIDO_DOS, :FECHA_NACIMIENTO, :CIVIL, :DIRECCION, :EMAIL, :TELEFONO,  :AFP, :SALUD, :CARGO, :LUGAR, :COMUNA , :NOMBRE_FAENA ,:FECHA_INGRESO, :HORARIO, 'ACTIVO')";

        $pdo = conexionBD::cBD()->prepare($query);

        $pdo->bindParam(":RUT", $trabajador["rut"], PDO::PARAM_STR);
        $pdo->bindParam(":DV", $trabajador["dv"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_UNO", $trabajador["nombreUno"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_DOS", $trabajador["nombreDos"], PDO::PARAM_STR);
        $pdo->bindParam(":APELLIDO_UNO", $trabajador["apellidoUno"], PDO::PARAM_STR);
        $pdo->bindParam(":APELLIDO_DOS", $trabajador["apellidoDos"], PDO::PARAM_STR);
        $pdo->bindParam(":FECHA_NACIMIENTO", $trabajador["nacimiento"], PDO::PARAM_STR);
        $pdo->bindParam(":CIVIL", $trabajador["civil"], PDO::PARAM_STR);
        $pdo->bindParam(":DIRECCION", $trabajador["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":EMAIL", $trabajador["email"], PDO::PARAM_STR);
        $pdo->bindParam(":TELEFONO", $trabajador["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":AFP", $trabajador["afp"], PDO::PARAM_STR);
        $pdo->bindParam(":SALUD", $trabajador["salud"], PDO::PARAM_STR);
        $pdo->bindParam(":CARGO", $trabajador["cargo"], PDO::PARAM_STR);
        $pdo->bindParam(":LUGAR", $trabajador["lugar"], PDO::PARAM_STR);
        $pdo->bindParam(":COMUNA", $trabajador["comuna"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_FAENA", $trabajador["nombreFaena"], PDO::PARAM_STR);
        $pdo->bindParam(":FECHA_INGRESO", $trabajador["fechaIngreso"], PDO::PARAM_STR);
        $pdo->bindParam(":HORARIO", $trabajador["horario"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return array("ESTADO" => true, "MOTIVO" => "Trabajador guardado correctamente");
        } else {
            return array("ESTADO" => false, "MOTIVO" => "Error al guardar el trabajador");
        }
    }

    static function  buscarTrabajadorM($rut)
    {

        $query = "SELECT * FROM TRABAJADORES WHERE RUT_TRABAJADOR = :RUT";
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo->bindParam(":RUT", $rut, PDO::PARAM_STR);
        $pdo->execute();
        $trabajador = $pdo->fetch(PDO::FETCH_ASSOC);
        return $trabajador;
    }


    static function listarTrabajadoresM($condicion)
    {

        $query = "SELECT CONCAT(T.RUT_TRABAJADOR,'-',T.DV_TRABAJADOR) AS RUT , 
        CONCAT(T.PRIMER_NOMBRE,' ',T.SEGUNDO_NOMBRE,' ',T.APELLIDO_PATERNO,' ',T.APELLIDO_MATERNO) AS NOMBRE, 
        T.CARGO, T.NOMBRE_FAENA AS LUGAR, T.HORARIO , T.ESTADO FROM TRABAJADORES AS T $condicion";
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo->execute();
        $trabajadores = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $trabajadores;
    }

    static function cambiarEstadoTrabajadorM($rut, $estado){

        $query = "UPDATE TRABAJADORES SET ESTADO = :ESTADO WHERE RUT_TRABAJADOR = :RUT";
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo->bindParam(":RUT", $rut, PDO::PARAM_STR);
        $pdo->bindParam(":ESTADO", $estado, PDO::PARAM_STR);
       
        if( $pdo->execute()) {
            return array("ESTADO" => true, "MOTIVO" => "Estado cambiado correctamente");
        } else {
            return array("ESTADO" => false, "MOTIVO" => "Error al cambiar el estado");
        }
    


    }

    static function buscarTrabajadorByIdM($rut){

        $query = "SELECT T.RUT_TRABAJADOR AS RUT,T.DV_TRABAJADOR AS DV,
        T.PRIMER_NOMBRE AS NOMBRE_UNO,
        T.SEGUNDO_NOMBRE AS NOMBRE_DOS,
        T.APELLIDO_PATERNO AS APELLIDO_UNO,
        T.APELLIDO_MATERNO AS APELLIDO_DOS,
        T.FECHA_NACIMIENTO AS NACIMIENTO,
        T.ESTADO_CIVIL AS CIVIL,
        T.DIRECCION AS DIRECCION,
        T.MAIL AS EMAIL,
        T.TELEFONO AS TELEFONO,
        T.AFP AS AFP,
        T.SALUD AS SALUD,
        T.CARGO AS CARGO,
        T.LUGAR_FUNCIONES AS LUGAR,
        T.COMUNA_FAENA AS COMUNA,
        T.NOMBRE_FAENA AS NOMBRE_FAENA,
        T.FECHA_CONTRATO AS CONTRATO,
        T.HORARIO AS HORARIO
        FROM TRABAJADORES AS T
        WHERE RUT_TRABAJADOR = :RUT";
        $pdo = conexionBD::cBD()->prepare($query);
        $pdo->bindParam(":RUT", $rut, PDO::PARAM_STR);
        $pdo->execute();
        $trabajador = $pdo->fetch(PDO::FETCH_ASSOC);
        return $trabajador;





    }


    static function actualizarTrabajadorM($datos){

        $query = "UPDATE TRABAJADORES SET
        RUT_TRABAJADOR = :RUT,
        DV_TRABAJADOR = :DV,
        PRIMER_NOMBRE = :NOMBRE_UNO,
        SEGUNDO_NOMBRE = :NOMBRE_DOS,
        APELLIDO_PATERNO = :APELLIDO_UNO,
        APELLIDO_MATERNO = :APELLIDO_DOS,
        FECHA_NACIMIENTO = :FECHA_NACIMIENTO,
        ESTADO_CIVIL = :CIVIL,
        DIRECCION = :DIRECCION,
        MAIL = :EMAIL,
        TELEFONO = :TELEFONO,
        AFP = :AFP,
        SALUD = :SALUD,
        CARGO = :CARGO,
        LUGAR_FUNCIONES = :LUGAR,
        COMUNA_FAENA = :COMUNA,
        NOMBRE_FAENA = :NOMBRE_FAENA,
        FECHA_CONTRATO = :CONTRATO,
        HORARIO = :HORARIO
        WHERE RUT_TRABAJADOR = :id";
        $pdo = conexionBD::cBD()->prepare($query);

        $pdo->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $pdo->bindParam(":RUT", $datos["rut"], PDO::PARAM_STR);
        $pdo->bindParam(":DV", $datos["dv"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_UNO", $datos["nombreUno"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_DOS", $datos["nombreDos"], PDO::PARAM_STR);
        $pdo->bindParam(":APELLIDO_UNO", $datos["apellidoUno"], PDO::PARAM_STR);
        $pdo->bindParam(":APELLIDO_DOS", $datos["apellidoDos"], PDO::PARAM_STR);
        $pdo->bindParam(":FECHA_NACIMIENTO", $datos["nacimiento"], PDO::PARAM_STR);
        $pdo->bindParam(":CIVIL", $datos["civil"], PDO::PARAM_STR);
        $pdo->bindParam(":DIRECCION", $datos["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":EMAIL", $datos["email"], PDO::PARAM_STR);
        $pdo->bindParam(":TELEFONO", $datos["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":AFP", $datos["afp"], PDO::PARAM_STR);
        $pdo->bindParam(":SALUD", $datos["salud"], PDO::PARAM_STR);
        $pdo->bindParam(":CARGO", $datos["cargo"], PDO::PARAM_STR);
        $pdo->bindParam(":LUGAR", $datos["lugar"], PDO::PARAM_STR);
        $pdo->bindParam(":COMUNA", $datos["comuna"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_FAENA", $datos["nombreFaena"], PDO::PARAM_STR);
        $pdo->bindParam(":CONTRATO", $datos["fechaIngreso"], PDO::PARAM_STR);
        $pdo->bindParam(":HORARIO", $datos["horario"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return array("ESTADO" => true, "MOTIVO" => "Trabajador actualizado correctamente");
        } else {
            return array("ESTADO" => false, "MOTIVO" => "Error al actualizar el trabajador");
        }



    }


}
