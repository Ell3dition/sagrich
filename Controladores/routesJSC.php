<?php
if (!isset($_SESSION)) {
    session_start();
}

class RoutesJSC
{
    function routesAdministrador($url)
    {
        if (
            $url == "salir" || $url == "usuarios"
        ) {
            echo '<script src="Vistas/js/app/' . $url . '.js" ></script>';
        }
    }
}
