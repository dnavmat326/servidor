<?php
class BarajaInglesa extends Baraja
{
    private static $palos = ["corazones", "diamantes", "picas", "treboles"];
    private static $figuras = ["as", 2, 3, 4, 5, 6, 7, 8, 9, "jota", "reina", "rey"];

    public function __construct()
    {
        parent::__construct();
        self::generarMazo();

    }

    public function repartirCarta()
    {
        return $this->mazo[0];
    }

    private function generarMazo()
    {
        for ($i = 0; $i < count(self::$palos); $i++) {
            for ($j = 0; $j < count(self::$figuras); $j++) {
                array_push($this->mazo, new Carta(self::$palos[$i], self::$figuras[$j]));
            }
        }

        self::barajar();
        
    }







}








?>