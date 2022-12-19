<?php

class EnlaceBD
{

    public static function getEnlaces($id)
    {

        $conexion = ConexionBD::conectar();
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM enlaces WHERE idRegalo = $id");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $enlaces = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlace');

        ConexionBD::cerrar();

        return $enlaces;
    }

    public static function getEnlacesOrdenados($id)
    {

        $conexion = ConexionBD::conectar();
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM enlaces WHERE idRegalo = $id ORDER BY precio");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $enlaces = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlace');

        ConexionBD::cerrar();

        return $enlaces;
    }




    public static function insert($nombre, $link, $precio, $imagen, $prioridad)
    {
        $conexion = ConexionBD::conectar();



        try {
            //Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO enlaces (nombre, link, precio, imagen,prioridad,idRegalo) VALUES (?, ?, ?, ?, ?,?)");

            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $link);
            $stmt->bindValue(3, $precio);
            $stmt->bindValue(4, $imagen);
            $stmt->bindValue(5, $prioridad);
            $stmt->bindValue(6, $_SESSION['idRegalo']);

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
            $stmt = $conexion->prepare("DELETE FROM  enlaces WHERE idEnlace = ?");

            $stmt->bindValue(1, $id);

            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        ConexionBD::cerrar();
    }






}
?>