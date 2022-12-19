<?php

class ControladorPartida
{

    public static function login($email, $password)
    {

        if (PartidaBD::check($email, $password) == true) {
            $_SESSION['usuario'] = $email;
            self::mostrarPartidas();
        } else {
            header("Location: login.php?error");
        }


    }


    public static function mostrarPartidas()
    {
        //LLamar al modelo para obtener todas las partidas
        $partidas = PartidaBD::getPartidas();

        //Llamar a una vista para pintar 
        VistaPartidas::render($partidas);
    }

    public static function insertar($fecha, $hora, $ciudad, $lugar, $cubierto)
    {
        //LLamar al modelo para insertar
        PartidaBD::insert($fecha, $hora, $ciudad, $lugar, $cubierto);

        //Llamar a una vista para pintar 
        self::mostrarPartidas();
    }
    public static function delete($id)
    {
        //LLamar al modelo para borrar
        PartidaBD::del($id);

        //Llamar a una vista para pintar 
        self::mostrarPartidas();
    }

    public static function informacion($id)
    {
        //LLamar al modelo para obtener la informacion
        $partida = PartidaBD::getPartida($id);


        //Llamar a una vista para pintar 
        VistaPartidas::renderPartida($partida);
    }

    public static function updateEstado($id){
        //LLamar al modelo para actualizar el estado
        PartidaBD::updatePartida($id);
        $partida = PartidaBD::getPartida($id);


        //Llamar a una vista para pintar 
        VistaPartidas::renderPartida($partida);
    }

    public static function apuntarse($id){
        //LLamar al modelo para actualizar la partida
        PartidaBD::apuntarse($id);
        $partida = PartidaBD::getPartida($id);


        //Llamar a una vista para pintar 
        VistaPartidas::renderPartida($partida);
    }
    public static function desapuntarse($id){
        //LLamar al modelo para actualizar la partida
        PartidaBD::desapuntarse($id);
        $partida = PartidaBD::getPartida($id);


        //Llamar a una vista para pintar 
        VistaPartidas::renderPartida($partida);
    }
    
    public static function mostrarPartidaFecha($fecha){
         //LLamar al modelo para obtener las partidas
         $partidas = PartidaBD::getPartidasFecha($fecha);

         //Llamar a una vista para pintar 
         VistaPartidas::render($partidas);
    }

    public static function mostrarPartidaCiudad($ciudad){
        //LLamar al modelo para obtener las partidas
        $partidas = PartidaBD::getPartidasCiudad($ciudad);

        //Llamar a una vista para pintar 
        VistaPartidas::render($partidas);
   }

}



?>