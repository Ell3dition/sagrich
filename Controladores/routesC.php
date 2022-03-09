<?php
if (!isset($_SESSION)) {
    session_start();
}

class RoutesC
{
    function routesAdministrador($url)
    {
        if (
            $url == "salir" || $url == "usuarios"
        ) {
            include "Vistas/modulos/" . $_GET["url"] . ".php";
        } else {

            include "Vistas/modulos/pageNotFound.php";
        }
    }
}
