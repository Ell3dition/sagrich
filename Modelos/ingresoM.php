<?php

require_once 'conexionBD.php';


class IngresoM extends ConexionBD {


    static function ingresoUsuarioM($usuario) {

        $pdo = conexionBD::cBD()->prepare("SELECT * FROM USUARIOS WHERE NOMBRE_USUARIO = :usuario");

            $pdo -> bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
            $pdo = null;


    }





}