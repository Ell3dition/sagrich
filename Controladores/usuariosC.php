<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_POST["accion"])) {
    return;
} else {
    require_once "../Modelos/usuariosM.php";
}

class UsuariosC
{



    //INGRESAR USUARIOS
    public function IngresoUsuariosC()
    {

        if (isset($_POST["usuario-Ing"])) {


            if (preg_match('/^[a-zA-Z0-9.]+$/', $_POST["usuario-Ing"]) && (preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"]))) {


                $datosC = array("usuario" => $_POST["usuario-Ing"], "pass" => $_POST["clave-Ing"]);

                $tablaBD = "USUARIOS";
                $respuesta = UsuariosM::IngresoUsuariosM($datosC, $tablaBD);

                if ($respuesta["NOMBRE_USUARIO"] == $_POST["usuario-Ing"] && password_verify($_POST["clave-Ing"], $respuesta["PWD_USUARIO"])) {


                    if ($respuesta["ESTADO_USUARIO"] == "HABILITADO") {


                        $_SESSION["passDefault"] =    password_verify("1234", $respuesta["PWD_USUARIO"]) ? "Default" : false;
                        $_SESSION["Ingreso"] = "INGRESO";
                        $_SESSION["id"] = $respuesta["ID_USUARIOS"];
                        $_SESSION["usuario"] = $respuesta["NOMBRE_USUARIO"];
                        $_SESSION["foto"] = $respuesta["FOTO_USUARIO"];
                        $_SESSION["rol"] = $respuesta["ROL_USUARIO"];
                        echo '<script>window.location = "inicio";</script>';
                    } else {

                        echo '<script> window.alert("USUARIO DESHABILITADO");
                        </script>';
                    }
                } else {


                    echo '<script> window.alert("USUARIO O CONTRASEÑA INCORRECTA");
                    </script>';
                }
            }
        }
    }



    //crear usuarios













  
}

if (isset($_POST["accion"])) {

   
}
