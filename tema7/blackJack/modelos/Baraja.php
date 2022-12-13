<?php
abstract class Baraja
{
    protected $mazo;



    public function __construct()
    {
        $this->mazo = array();

    }

    public abstract function repartirCarta();

    public function barajar()
    {
        shuffle($this->mazo);
    }

    public function listar()
    {
        for ($i = 0; $i < count($this->mazo); $i++) {
            echo ($this->mazo[$i]);
        }
    }






    /**
     * Get the value of mazo
     */ 
    public function getMazo()
    {
        return $this->mazo;
    }
}








?>