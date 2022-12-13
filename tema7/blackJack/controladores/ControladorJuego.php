<?php

class ControladorJuego
{



    public static function crearPartida()
    {
        $jugador = new Jugador();
        $maquina = new Jugador();
        $baraja = new BarajaInglesa();
        $partida = new Partida($jugador, $maquina, $baraja);
        $_SESSION['partida'] = serialize($partida);
        $_SESSION['cartas'] = 0;
        $_SESSION['contadorJugador'] = 0;
        $_SESSION['contadorMaquina'] = 0;
        $_SESSION['jugadorP'] = false;
        $_SESSION['resultado'] = "";
        $_SESSION['result'] = "";

        //Llamar a una vista para pintar el juego
        self::pedirCarta();
    }

    public static function pedirCarta()
    {


        $partida = unserialize($_SESSION['partida']);
        $jugador = $partida->getJugador();
        $maquina = $partida->getMaquina();
        $baraja = $partida->getBaraja();

        if ($_SESSION['jugadorP'] == true) {
            $partida->setEstadoJ("plantado");
        }
        $manoAnteriorJ = $_SESSION['contadorJugador'];
        $manoAnteriorM = $_SESSION['contadorMaquina'];

        if ($partida->getEstadoJ() == "jugando") {
            $mazo = $baraja->getMazo()[$_SESSION['cartas']];
            $jugadorCarta = new Carta($mazo->getPalo(), $mazo->getFigura());
            $_SESSION['cartas']++;
            $jugador->nuevaCarta($jugadorCarta);
            $_SESSION['contadorJugador'] = $jugador->valorMano();


            if ($_SESSION['contadorJugador'] == 21) {
                $partida->setEstadoJ("ganado");
            }
            if ($_SESSION['contadorJugador'] > 21) {
                $partida->setEstadoJ("perdido");
            }

        }



        if ($partida->getEstadoM() == "jugando") {

            $mazo = $baraja->getMazo()[$_SESSION['cartas']];
            $maquinaCarta = new Carta($mazo->getPalo(), $mazo->getFigura());
            $_SESSION['cartas']++;
            $maquina->nuevaCarta($maquinaCarta);
            $_SESSION['contadorMaquina'] = $maquina->valorMano();
            if ($_SESSION['contadorMaquina'] == 21) {
                $partida->setEstadoM("ganado");
            }
            if ($_SESSION['contadorMaquina'] > 21) {
                $partida->setEstadoM("perdido");
            }
            if ($_SESSION['contadorMaquina'] > 16 && $_SESSION['contadorMaquina'] < 21) {
                $partida->setEstadoM("plantado");
            }

        }



        //Comprobar ganador
        $restoJ = 21 - $_SESSION['contadorJugador'];
        $restoM = 21 - $_SESSION['contadorMaquina'];

        if ($partida->getEstadoJ() == "plantado" && $partida->getEstadoM() == "jugando" && $restoJ > $restoM) {
            $partida->setEstadoM("ganado");
        }

        if ($restoJ < $restoM && $restoJ >= 0) {
            $_SESSION['resultado'] = "Gana Jugador";
        }
        if ($restoJ > $restoM && $restoM >= 0) {
            $_SESSION['resultado'] = "Gana Crupier";
        }
        if ($restoJ == $restoM) {
            $_SESSION['resultado'] = "Empate";
        }
        if ($restoM < 0 && $restoJ < 0) {
            if ($restoM > $restoJ) {
                $_SESSION['resultado'] = "Gana Crupier";
            }
            if ($restoM < $restoJ) {
                $_SESSION['resultado'] = "Gana Jugador";
            }
        }
        if ($restoM < 0 && $restoJ >= 0) {
            $_SESSION['resultado'] = "Gana Jugador";

        }
        if ($restoJ < 0 && $restoM >= 0) {
            $_SESSION['resultado'] = "Gana Crupier";

        }

        if ($manoAnteriorJ == $_SESSION['contadorJugador'] && $manoAnteriorM == $_SESSION['contadorMaquina']) {
            $_SESSION['result'] = true;

        }






        $_SESSION['partida'] = serialize($partida);



        //Llamar a una vista para pintar el juego
        VistaJuego::renderPartida();

    }






}



?>