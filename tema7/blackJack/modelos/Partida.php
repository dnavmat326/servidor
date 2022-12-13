<?php

class Partida
{
    private $jugador;
    private $maquina;

    private $baraja;
    private $estadoJ;
    private $estadoM;



    public function __construct($jugador, $maquina, $baraja)
    {
        $this->jugador = $jugador;
        $this->maquina = $maquina;
        $this->baraja = $baraja;
        $this->estadoJ = "jugando";
        $this->estadoM = "jugando";


    }


    /**
     * Get the value of jugador
     */ 
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Get the value of maquina
     */ 
    public function getMaquina()
    {
        return $this->maquina;
    }

    /**
     * Get the value of baraja
     */ 
    public function getBaraja()
    {
        return $this->baraja;
    }

    /**
     * Get the value of estadoJ
     */ 
    public function getEstadoJ()
    {
        return $this->estadoJ;
    }

    /**
     * Set the value of estadoJ
     *
     * @return  self
     */ 
    public function setEstadoJ($estadoJ)
    {
        $this->estadoJ = $estadoJ;

        return $this;
    }

    /**
     * Get the value of estadoM
     */ 
    public function getEstadoM()
    {
        return $this->estadoM;
    }

    /**
     * Set the value of estadoM
     *
     * @return  self
     */ 
    public function setEstadoM($estadoM)
    {
        $this->estadoM = $estadoM;

        return $this;
    }
}










?>