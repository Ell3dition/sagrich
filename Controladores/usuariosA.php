<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "../Modelos/usuariosM.php";

class UsuariosA
{
    public function GuardarUsuariosA()
    {
        $user = $_POST["userN"];
        $rol = $_POST["rolN"];
        $rutaImgUNO = "";

        if ($user == "") {
            echo json_encode(array("Estado" => false, "Motivo" => "El campo usuario no puede estar vacio"));
            return;
        }
        if ($rol == "0") {
            echo json_encode(array("Estado" => false, "Motivo" => "Debe seleccionar al menos un rol"));
            return;
        }
        if (isset($_FILES["fotoN"]["tmp_name"]) && !empty(($_FILES["fotoN"]["tmp_name"]))) {

            if (($_FILES["fotoN"]["type"] == "image/jpeg")) {
                $nomNumeral = mt_rand(10, 9999);
                $nombre = "U" . $nomNumeral . ".jpg";
                $rutaImgUNO = "Vistas/img/users/" . $nombre;
                $imagen = imagecreatefromjpeg($_FILES["fotoN"]["tmp_name"]);
                imagejpeg($imagen, "../" . $rutaImgUNO);
            }

            if (($_FILES["fotoN"]["type"] == "image/png")) {
                $nomNumeral = mt_rand(10, 9999);
                $nombre = "U" . $nomNumeral . ".png";
                $rutaImgUNO = "Vistas/img/users/" . $nombre;
                $imagen = imagecreatefrompng($_FILES["fotoN"]["tmp_name"]);
                imagepng($imagen, "../" . $rutaImgUNO);
            }
        }


        $datos = array("usuario" => $user,  "Rol" => $rol, "foto" => $rutaImgUNO);
        $respuesta = UsuariosM::CrearUsuariosM($datos);
        echo json_encode($respuesta);
    }

    public function ActualizarPassA()
    {
        $data = $_POST["data"];
        echo json_encode($data);
    }

    public function ListarUsersA()
    {
        $respuesta = UsuariosM::ListarUsersM();
        echo json_encode($respuesta);
    }

    public function CambiarEstadoUserA()
    {
        $id = $_POST["idUsuario"];
        $estado = ($_POST["estado"] == "deshabilitar") ? "DESHABILITADO" : "HABILITADO";
        $respuesta = UsuariosM::CambiarEstadoUserM($id, $estado);
        echo json_encode($respuesta);
    }

    public function ResetPwdA()
    {
        $id = $_POST["idUsuario"];
        $respuesta = UsuariosM::ResetPwdM($id);
        echo json_encode($respuesta);
    }

    public function ActulizarUsuarioA()
    {
        $user = $_POST["userE"];
        $rol = $_POST["rolE"];
        $id = $_POST["idUsuario"];
        $rutaImgUNO = $_POST["imgActualEd"];

        if ($user == "") {
            echo json_encode(array("Estado" => false, "Motivo" => "El campo usuario no puede estar vacio"));
            return;
        }
        if ($rol == "0") {
            echo json_encode(array("Estado" => false, "Motivo" => "Debe seleccionar al menos un rol"));
            return;
        }
        if (isset($_FILES["fotoE"]["tmp_name"]) && !empty(($_FILES["fotoE"]["tmp_name"]))) {
            if (!empty($rutaImgUNO)) {
                unlink("../" . $rutaImgUNO);
            }
            if (($_FILES["fotoE"]["type"] == "image/jpeg")) {
                $nomNumeral = mt_rand(10, 9999);
                $nombre = "U" . $nomNumeral . ".jpg";
                $rutaImgUNO = "Vistas/img/users/" . $nombre;
                $imagen = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);
                imagejpeg($imagen, "../" . $rutaImgUNO);
            }

            if (($_FILES["fotoE"]["type"] == "image/png")) {
                $nomNumeral = mt_rand(10, 9999);
                $nombre = "U" . $nomNumeral . ".png";
                $rutaImgUNO = "Vistas/img/users/" . $nombre;
                $imagen = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]);
                imagepng($imagen, "../" . $rutaImgUNO);
            }
        }


        $datos = array("usuario" => $user,  "Rol" => $rol, "foto" => $rutaImgUNO, "id" => $id);
        $respuesta = UsuariosM::ActulizarUsuarioM($datos);
        echo json_encode($respuesta);
    }

    public function ActualizarPerfilA()
    {
        $id = $_POST["idUsuario"];
        $rutaImgUNO = $_POST["imgActualEd"];

        if (isset($_FILES["fotoE"]["tmp_name"]) && !empty(($_FILES["fotoE"]["tmp_name"]))) {
            if (!empty($rutaImgUNO)) {
                unlink("../" . $rutaImgUNO);
            }
            if (($_FILES["fotoE"]["type"] == "image/jpeg")) {
                $nomNumeral = mt_rand(10, 9999);
                $nombre = "U" . $nomNumeral . ".jpg";
                $rutaImgUNO = "Vistas/img/users/" . $nombre;
                $imagen = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);
                imagejpeg($imagen, "../" . $rutaImgUNO);
            }

            if (($_FILES["fotoE"]["type"] == "image/png")) {
                $nomNumeral = mt_rand(10, 9999);
                $nombre = "U" . $nomNumeral . ".png";
                $rutaImgUNO = "Vistas/img/users/" . $nombre;
                $imagen = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]);
                imagepng($imagen, "../" . $rutaImgUNO);
            }
        }

        $respuesta = UsuariosM::ActualizarPerfilM($rutaImgUNO, $id);
        echo json_encode($respuesta);
    }

    function cambiarPassC()
    {
        $pass = UsuariosM::verificarPassM($_SESSION["id"]);
        $passActual = $_POST["origen"] == "menu" ? $_POST["passActual"] : "1234";

        if (password_verify($passActual, $pass->PASS)) {
            if ($_POST["passNueva"] === $_POST["passRep"]) {
                if (strlen($_POST["passNueva"]) > 5) {
                    if (!password_verify($_POST["passNueva"], $pass->PASS)) {
                        $respuesta = UsuariosM::cambiarPassM($_SESSION["id"], $_POST["passNueva"]);
                        if (is_numeric($respuesta)) {
                            $_SESSION["passDefault"] = false;
                        }
                        echo json_encode($respuesta);
                    } else {
                        echo json_encode(array("Estado" => false, "Motivo" => "La Nueva contraseña debe ser distinta a la anterior"));
                    }
                } else {

                    echo json_encode(array("Estado" => false, "Motivo" => "La Nueva contraseña debe tener un minimo de 6 caracteres"));
                }
            } else {
                echo json_encode(array("Estado" => false, "Motivo" => "Las contraseñas no Coinciden intente nuevamente"));
            }
        } else {

            echo json_encode(array("Estado" => false, "Motivo" => "La contraseña actual no es correcta intente nuevamente"));
        }
    }
}

if (isset($_SESSION["Ingreso"]) && $_SESSION["Ingreso"]  == TRUE) {
    if ($_POST["accion"] == 'crearUsuario') {
        $imagen = new UsuariosA();
        $imagen->GuardarUsuariosA();
    } else if ($_POST["accion"] == "ActualizarPass") {
        $pass = new UsuariosA();
        $pass->ActualizarPassA();
    } else if ($_POST["accion"] == "listarUsers") {
        $pass = new UsuariosA();
        $pass->ListarUsersA();
    } else if ($_POST["accion"] == "cambiarEstado") {
        $pass = new UsuariosA();
        $pass->CambiarEstadoUserA();
    } else if ($_POST["accion"] == "resetPwd") {
        $pass = new UsuariosA();
        $pass->ResetPwdA();
    } else if ($_POST["accion"] == "actualizarUsuario") {
        $pass = new UsuariosA();
        $pass->ActulizarUsuarioA();
    } else if ($_POST["accion"] == "editarPerfil") {
        $pass = new UsuariosA();
        $pass->ActualizarPerfilA();
    } else  if ($_POST["accion"] == "cambiarPass") {
        $cambiarPass = new UsuariosA();
        $cambiarPass->cambiarPassC();
    }
}else{
    echo json_encode(array("Estado" => false, "Motivo" => "No tienes permiso para realizar esta accion"));
}
