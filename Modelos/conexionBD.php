<?php

class conexionBD
{


    static public function cBD()
    {
        //BASE DE DATOS DE DESARROLLO
        //    $dbname = "SAGRICH";
        //    $user = 'root';
        //    $pass = '';
        //    $host = 'localhost';



        //BASE DE DATOS PRODUCCION

        $dbname = "csa80265_sagrich_sistema";
        $user = 'csa80265_sagrich';
        $pass = 'NU!@,68Y5tkg';
        // $host = '190.107.177.250';
        $host = 'localhost';

        try {
            $bd = new PDO("mysql:host=$host:3306;dbname=$dbname", $user, $pass);
            $bd->exec("set names utf8");
            $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $bd;
        } catch (PDOException $e) {

            echo 'Fallo la coneccion ' . $e->getMessage();
        }
    }

 
}
