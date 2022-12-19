<?php

class JugadorBD
{
  
    public static function getJugador($id)
    {
        if($id>0){

        
        $conexion = ConexionBD::conectar();
        //Consulta BBDD PARTIDA
        $stmt = $conexion->prepare("SELECT * FROM jugadores where idJugador =? ");

        $stmt->bindValue(1, $id);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $jugador = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');

        ConexionBD::cerrar();

        return $jugador[0];
    }
    }




}
?>