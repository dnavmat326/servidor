<?php
class Carta
{
    protected $palo;
    protected $figura;



    public function __construct($palo, $figura)
    {
        $this->palo = $palo;
        $this->figura = $figura;

    }

    public function __toString()
    {
        return $this->palo . " " . $this->figura;
    }


    /**
     * Get the value of figura
     */
    public function getFigura()
    {
        return $this->figura;
    }

    /**
     * Set the value of figura
     *
     * @return  self
     */
    public function setFigura($figura)
    {
        $this->figura = $figura;

        return $this;
    }

    /**
     * Get the value of palo
     */
    public function getPalo()
    {
        return $this->palo;
    }

    /**
     * Set the value of palo
     *
     * @return  self
     */
    public function setPalo($palo)
    {
        $this->palo = $palo;

        return $this;
    }

    /**
     * Get valor de la carta
     */
    public static function getValor(Carta $carta)
    {
        //"as", 2, 3, 4, 5, 6, 7, 8, 9, "jota", "reina", "rey"
        $valor = 0;
        switch($carta->getFigura()) {
            case "as": $valor = 11; break;
            case 2: $valor = 2; break;
            case 3: $valor = 3; break;
            case 4: $valor = 4; break;
            case 5: $valor = 5; break;
            case 6: $valor = 6; break;
            case 7: $valor = 7; break;
            case 8: $valor = 8; break;
            case 9: $valor = 9; break;
            case "jota": $valor = 10; break;
            case "reina": $valor = 10; break;
            case "rey": $valor = 10; break;

        }

        return $valor;
    }





}








?>