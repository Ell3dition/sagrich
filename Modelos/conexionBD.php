<?php

class conexionBD
{


    static public function cBD()
    {
        //BASE DE DATOS DE DESARROLLO
           $dbname = "SAGRICH";
           $user = 'root';
           $pass = '';
           $host = 'localhost';



        //BASE DE DATOS PRODUCCION

        // $dbname = "cma77781_ADMIN_WEB";
        // $user = 'cma77781_cma77781';
        // $pass = 'FdkAdkPkOaCYATLCmnCK';
        // $host = '190.107.177.236';

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
