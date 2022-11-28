<?php

class PrestamoBD
{

    public static function getPrestamos()
    {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT prestamos.idPrestamo, libros.titulo, usuarios.nombre, prestamos.fecha_inicio, prestamos.fecha_fin,prestamos.estado FROM prestamos join usuarios join libros where prestamos.idUsuario=usuarios.idUsuario and prestamos.idLibro=libros.idLibro");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $prestamos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prestamo');

        ConexionBD::cerrar();

        return $prestamos;
    }

    public static function insertPrestamo($usuario,$libro,$estado,$fechaI,$fechaF)
    {
        $conexion = ConexionBD::conectar();

        try {
              //Consulta BBDD
        $stmt = $conexion->prepare("INSERT INTO biblioteca.prestamos (idLibro, idUsuario, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?)");
    
            $stmt->bindValue(1, $libro);
            $stmt->bindValue(2, $usuario);
            $stmt->bindValue(3, $fechaI);
            $stmt->bindValue(4, $fechaF);
            $stmt->bindValue(5, $estado);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
     
        ConexionBD::cerrar();

       

       
    }

    public static function updatePrestamo($id,$estado,$fechaI,$fechaF)
    {
        $conexion = ConexionBD::conectar();

        try {
              //Consulta BBDD
        $stmt = $conexion->prepare("UPDATE biblioteca.prestamos SET estado=?,fecha_inicio=?,fecha_fin=?  WHERE idPrestamo=?");
    
            $stmt->bindValue(1, $estado);
            $stmt->bindValue(2, $fechaI);
            $stmt->bindValue(3, $fechaF);
            $stmt->bindValue(4, $id);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
     
        ConexionBD::cerrar();

       

       
    }
}
?>