<?php

class PartidaBD
{
    public static function check($email, $password)
    {
        $conexion = ConexionBD::conectar();

        $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE email = ? AND password = ?");
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        $jugador = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');

        $filas = $stmt->rowCount();

        if ($filas == 0) {
            return false;
        } else {
            $_SESSION['jugador'] = serialize($jugador[0]);
            ConexionBD::cerrar();
            return true;
        }
    }
    public static function getPartidas()
    {
        $hoy = date('Y-m-d');
        $conexion = ConexionBD::conectar();
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas where fecha >= '$hoy' order by fecha ");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partidas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');

        ConexionBD::cerrar();

        return $partidas;
    }
    public static function getPartida($id)
    {
        $conexion = ConexionBD::conectar();
        //Consulta BBDD PARTIDA
        $stmt = $conexion->prepare("SELECT * FROM partidas where idPartida =? ");

        $stmt->bindValue(1, $id);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partidas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');

        ConexionBD::cerrar();

        return $partidas[0];
    }

    public static function updatePartida($id)
    {
        $conexion = ConexionBD::conectar();
        //Consulta BBDD PARTIDA
        $stmt = $conexion->prepare("UPDATE partidas SET estado = ? WHERE idPartida =?");

        $stmt->bindValue(1, "cerrada");
        $stmt->bindValue(2, $id);

        $stmt->execute();


        ConexionBD::cerrar();

        
    }

    public static function apuntarse($id)
    {
        $conexion = ConexionBD::conectar();
        //Consulta BBDD PARTIDA
        $stmt = $conexion->prepare("UPDATE partidas SET ".$_SESSION['contador']." = ? WHERE idPartida =?");


        $stmt->bindValue(1, unserialize($_SESSION['jugador'])->getIdJugador());
        $stmt->bindValue(2, $id);

        $stmt->execute();


        ConexionBD::cerrar();

        
    }
    public static function desapuntarse($id)
    {
        $conexion = ConexionBD::conectar();
        //Consulta BBDD PARTIDA
        $stmt = $conexion->prepare("UPDATE partidas SET ".$_SESSION['desapuntarse']." = ? WHERE idPartida =?");


        $stmt->bindValue(1, null);
        $stmt->bindValue(2, $id);

        $stmt->execute();


        ConexionBD::cerrar();

        
    }



    public static function insert($fecha, $hora, $ciudad, $lugar, $cubierto)
    {
        $conexion = ConexionBD::conectar();
        $jugador = unserialize($_SESSION['jugador']);


        try {
            //Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO partidas (fecha, hora, ciudad, lugar,cubierto,estado,idJugador1) VALUES (?, ?, ?, ?, ?,?,?)");

            $stmt->bindValue(1, $fecha);
            $stmt->bindValue(2, $hora);
            $stmt->bindValue(3, $ciudad);
            $stmt->bindValue(4, $lugar);
            $stmt->bindValue(5, $cubierto);
            $stmt->bindValue(6, "abierta");
            $stmt->bindValue(7, $jugador->getidJugador());


            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        ConexionBD::cerrar();
    }

    public static function del($id)
    {
        $jugador = unserialize($_SESSION['jugador']);

        $conexion = ConexionBD::conectar();

        try {
            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM  partidas WHERE idPartida = ? and idJugador1=? or idJugador2=?or idJugador3=? or idJugador4=?");

            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $jugador->getidJugador());
            $stmt->bindValue(3, $jugador->getidJugador());
            $stmt->bindValue(4, $jugador->getidJugador());
            $stmt->bindValue(5, $jugador->getidJugador());



            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        ConexionBD::cerrar();
    }

    public static function getPartidasFecha($fecha)
    {
        $conexion = ConexionBD::conectar();
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas WHERE fecha like ?");

        $stmt->bindValue(1, $fecha);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partidas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');

        ConexionBD::cerrar();

        return $partidas;
    }
    public static function getPartidasCiudad($ciudad)
    {
        $conexion = ConexionBD::conectar();
        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas WHERE ciudad like ?");

        $stmt->bindValue(1, $ciudad);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partidas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');

        ConexionBD::cerrar();

        return $partidas;
    }

   


}
?>