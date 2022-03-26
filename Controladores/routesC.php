<?php
if (!isset($_SESSION)) {
    session_start();
}
class RoutesC
{
    function routesAdministrador($url)
    {
        if ($url != "") {
            if (
                $url == "salir" || $url == "usuarios" ||  $url == "trabajadores"
            ) {
                include "Vistas/modulos/" . $_GET["url"] . ".php";
            } else {
                include "Vistas/modulos/pageNotFound.php";
            }
        } else {
            include "Vistas/modulos/trabajadores.php";
        }
    }

    function routesSupervisorCampo($url)
    {
        if ($url != "") {
            if (
                $url == "salir" ||  $url == "trabajadores"
            ) {
                include "Vistas/modulos/" . $_GET["url"] . ".php";
            } else {
                include "Vistas/modulos/pageNotFound.php";
            }
        } else {
            include "Vistas/modulos/trabajadores.php";
        }
    }
}
