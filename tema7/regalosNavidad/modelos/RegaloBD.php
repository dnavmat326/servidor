<?php

class RegaloBD
{

    public static function getRegalos($email)
    {

        $conexion = ConexionBD::conectar();
        $usuario = UsuarioBD::getUsuario($email);
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM regalos WHERE idUsuario=" . $usuario->getidUsuario() . "");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');

        ConexionBD::cerrar();

        return $regalos;
    }

    public static function insert($nombre, $destinatario, $precio, $estado, $year)
    {
        $conexion = ConexionBD::conectar();
        $usuario = UsuarioBD::getUsuario($_SESSION['usuario']);



        try {
            //Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO regalos (nombre, destinatario, precio, estado,year,idUsuario) VALUES (?, ?, ?, ?, ?,?)");

            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $destinatario);
            $stmt->bindValue(3, $precio);
            $stmt->bindValue(4, $estado);
            $stmt->bindValue(5, $year);
            $stmt->bindValue(6, $usuario->getidUsuario());

            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        ConexionBD::cerrar();
    }

    public static function del($id)
    {
        $conexion = ConexionBD::conectar();

        try {
            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM  regalos WHERE idRegalo = ?");

            $stmt->bindValue(1, $id);

            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        ConexionBD::cerrar();
    }

    public static function getRegalosYear($year)
    {
        $conexion = ConexionBD::conectar();
        $usuario = UsuarioBD::getUsuario($_SESSION['usuario']);
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM regalos WHERE idUsuario=? AND year = ?");

        $stmt->bindValue(1, $usuario->getidUsuario());
        $stmt->bindValue(2, $year);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');

        ConexionBD::cerrar();

        return $regalos;
    }

    public static function update($nombre, $destinatario, $precio, $estado, $year, $id)
    {
        $conexion = ConexionBD::conectar();

        try {
            //Consulta BBDD
            $stmt = $conexion->prepare("UPDATE regalos SET nombre=?,destinatario=?,precio=?,estado=?,year=?  WHERE idRegalo=?");

            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $destinatario);
            $stmt->bindValue(3, $precio);
            $stmt->bindValue(4, $estado);
            $stmt->bindValue(5, $year);
            $stmt->bindValue(6, $id);

            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        ConexionBD::cerrar();
    }


}
?>