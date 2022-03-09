
<?php
if (!isset($_SESSION)) {
    session_start();
}


include "../Modelos/ingresoM.php";

class IngresoC
{


    function ingresoUsuarioC()
    {

        //validar reCaptcha
        $keySecret = '6Lf-9F4dAAAAAOdT9sjKTajtQZc1Lroc7TRqla78';
        $response = $_POST["g-recaptcha-response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $keySecret . '&response=' . $response . '';

        $validacion = curl_init($url);
        curl_setopt($validacion, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($validacion, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($validacion);
        $response = json_decode($response);
        curl_close($validacion);

        if (!$response->success) {
            $error = array("Estado" => false, "Motivo" => "reCaptcha no superado, intente nuevamente");
            echo json_encode($error);
            return;
        }

        //validar usuario
        $usuario = $_POST["usuario-Ing"];
        $contrasena = $_POST["clave-Ing"];

        $respuesta = IngresoM::ingresoUsuarioM($usuario);

        if (!empty($respuesta)) {
            if (password_verify($contrasena, $respuesta->PASS_USUARIO) && $respuesta->NOMBRE_USUARIO == $usuario) {

                if ($respuesta->ESTADO_USUARIO != 'HABILITADO') {

                    $error = array("Estado" => false, "Motivo" => "Usuario deshabilitado, contácte al administrador");
                    echo json_encode($error);
                    return;
                }

                    $_SESSION["passDefault"] =    password_verify("1234", $respuesta->PASS_USUARIO) ? "Default" : false;
                    $_SESSION["Ingreso"]  = TRUE;
                    $_SESSION["usuario"] = $respuesta->NOMBRE_USUARIO;
                    $_SESSION["id"] = $respuesta->ID_USUARIO;
                    $_SESSION["rol"] = $respuesta->ROL_USUARIO;
                    $_SESSION["img"] = $respuesta->IMG_USUARIO;

                    echo json_encode(array("Estado" => true));
                    return;
           
            } else {
                $error = array("Estado" => false, "Motivo" => "Usuario o contraseña incorrecta");
                echo json_encode($error);
                return;
            }
        } else {
            $error = array("Estado" => false, "Motivo" => "Usuario no existe");
            echo json_encode($error);
            return;
        }
    }
}

if ($_POST['accion'] == 'ingresar') {

    $ingreso = new IngresoC();
    $ingreso->ingresoUsuarioC();
}
