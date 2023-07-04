<?php

require_once "conexionBD.php";

// INGRESAR AL GESTOR

class UsuariosM extends conexionBD
{

    // VER USUARIO

    static public function ListarUsersM()
    {

        $pdo = conexionBD::cBD()->prepare("SELECT ID_USUARIO AS ID , NOMBRE_USUARIO AS USER , IMG_USUARIO AS FOTO, ROL_USUARIO AS ROL,
        ESTADO_USUARIO AS ESTADO FROM USUARIOS");

        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_OBJ);
        $pdo = null;
    }



    //CREAR USUARIOS

    static public function CrearUsuariosM($datosC)
    {

      

        $estado = "HABILITADO";
        $pass = password_hash("1234", PASSWORD_DEFAULT);
        $pdo = conexionBD::cBD()->prepare("INSERT INTO USUARIOS (NOMBRE_USUARIO,PASS_USUARIO,IMG_USUARIO,ROL_USUARIO, ESTADO_USUARIO)
             VALUES (:usuario, :pwd, :foto, :Rol, :estado)");

        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":pwd", $pass, PDO::PARAM_STR);
        $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        $pdo->bindParam(":Rol", $datosC["Rol"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $estado, PDO::PARAM_STR);


        $respuesta = ($pdo->execute()) ? array("Estado"=>true, "Motivo"=> "Usuario Guardado con éxito") : array("Estado"=>false, "Motivo"=> "Hubo un problema al guardar el usuario") ;
        $pdo = null;
        return $respuesta;

        
    }


    //DESACTIVAR USUARIOS

    static public function CambiarEstadoUserM($id, $estado)
    {

        $pdo = conexionBD::cBD()->prepare("UPDATE USUARIOS SET ESTADO_USUARIO = :estado WHERE ID_USUARIO = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->bindParam(":estado", $estado, PDO::PARAM_STR);
        if ($pdo->execute()) {

            $pdo = null;
            return true;
        } else {
            $pdo = null;
            return false;
        }
    }



    //RESET PASWORD

    static public function ResetPwdM($id)
    {

        $pwd = password_hash("1234", PASSWORD_DEFAULT);
        $pdo = conexionBD::cBD()->prepare("UPDATE USUARIOS SET PASS_USUARIO = :pwd WHERE ID_USUARIO = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->bindParam(":pwd", $pwd, PDO::PARAM_STR);


        $respuesta = ($pdo->execute()) ? true : false;
        $pdo = null;
        return $respuesta;
    }

    //ver perfil del usuario


    static public function VerPerfilM($tablaBD, $id)
    {



        $pdo = conexionBD::cBD()->prepare("SELECT id, usuario, pass, foto FROM $tablaBD WHERE id =:id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        $pdo->execute();

        return $pdo->fetch();

        $pdo = null;
    }



    static public function verificarPassM($idUsuario)
    {

        $pdo = conexionBD::cBD()->prepare("SELECT PASS_USUARIO AS PASS FROM USUARIOS 
        WHERE ID_USUARIO = :id");
        $pdo->bindParam(":id", $idUsuario, PDO::PARAM_INT);
        $pdo->execute();
        $respuesta =  $pdo->fetch();
        $pdo = null;

        return $respuesta;
    }

    static public function  cambiarPassM($userID, $newPass)
    {

        $pass = password_hash($newPass, PASSWORD_DEFAULT);
        $pdo = conexionBD::cBD()->prepare("UPDATE USUARIOS SET PASS_USUARIO = :newPass
        WHERE ID_USUARIO = :userID ;");
        $pdo->bindParam(":userID", $userID, PDO::PARAM_INT);
        $pdo->bindParam(":newPass", $pass, PDO::PARAM_STR);
        $pdo->execute();
        $respuesta =  $pdo->rowCount();
        $pdo = null;

        return $respuesta;
    }

    static public function ActulizarUsuarioM($datosC){
    
        $pdo = conexionBD::cBD()->prepare("UPDATE USUARIOS SET NOMBRE_USUARIO = :usuario, 
        IMG_USUARIO = :foto, ROL_USUARIO = :rol WHERE ID_USUARIO = :id");

        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["Rol"], PDO::PARAM_STR);
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        


        $respuesta = ($pdo->execute()) ? array("Estado"=>true, "Motivo"=> "Usuario Actualizado con éxito") : array("Estado"=>false, "Motivo"=> "Hubo un problema al actualizar el usuario") ;
        $pdo = null;
        return $respuesta;



    }


    
    static public function ActualizarPerfilM($nombre, $id){
        
      
        $pdo = conexionBD::cBD()->prepare("UPDATE USUARIOS SET IMG_USUARIO = :foto WHERE ID_USUARIO = :id");

        $pdo->bindParam(":foto", $nombre, PDO::PARAM_STR);
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        $respuesta = ($pdo->execute()) ? array("Estado"=>true, "Motivo"=> "Foto Actualizada con éxito") : array("Estado"=>false, "Motivo"=> "Hubo un problema al actualizar la foto") ;
        $pdo = null;
        return $respuesta;
        




    }

}
