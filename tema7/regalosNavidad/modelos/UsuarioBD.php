<?php

class UsuarioBD
{

    public static function check($email, $password)
    {
        $conexion = ConexionBD::conectar();

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');

        $filas = $stmt->rowCount();

        if ($filas == 0) {
            return false;
        } else {
            ConexionBD::cerrar();
            return true;
        }
    }
    public static function getUsuario($email)
    {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = '$email'");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $usuario = $stmt->fetch();

        ConexionBD::cerrar();

        return $usuario;
    }
}
?>