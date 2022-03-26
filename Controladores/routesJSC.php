<?php
if (!isset($_SESSION)) {
    session_start();
}

class RoutesJSC
{
    function routesAdministrador($url)
    {
        if (
            $url == "salir" || $url == "usuarios" ||   $url == "trabajadores"
        ) {
            echo '<script src="Vistas/js/app/' . $url . '.js" type="module" ></script>';
        }
    }

    function routesSupervisorCampo($url)
    {
        if (
            $url == "salir" ||   $url == "trabajadores"
        ) {
            echo '<script src="Vistas/js/app/' . $url . '.js" type="module" ></script>';
        }
    }
}
