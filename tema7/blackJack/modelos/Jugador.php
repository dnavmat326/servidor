<?php
class Jugador
{
    private $mano;


    public function __construct()
    {
        $this->mano = array();
    }

    public function nuevaCarta(Carta $carta)
    {
        array_push($this->mano, $carta);
    }

    public function __toString()
    {
        for ($i = 0; $i < count($this->mano); $i++) {
            echo $this->mano[$i] . "<br>";
        }
        return "";
    }

    public function valorMano(){
        $valor = 0;
        for ($i = 0; $i < count($this->mano); $i++) {
            $valor +=  Carta::getValor($this->mano[$i]);
        }
        return $valor;
    }







    /**
     * Get the value of mano
     */ 
    public function getMano()
    {
        return $this->mano;
    }
}








?>