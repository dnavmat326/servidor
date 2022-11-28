<?php
class Truco
{
    private $nombre;
    private $descripcion;

    function __construct($nombre, $descripcion)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function setDescripcion($descripcion)
    {
        $this->nombre = $descripcion;
    }

    function pintar()
    {
        echo ("<p>" . $this->getNombre() . "</p>");
        echo ("<p>" . $this->getDescripcion() . "</p>");

    }
}

class Juego
{
    private $nombre;
    private $genero;
    private $plataforma;

    private $trucos;
    function __construct($nombre, $genero, $plataforma)
    {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->plataforma = $plataforma;
        $this->trucos = array();

    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getGenero()
    {
        return $this->genero;
    }

    function setGenero($genero)
    {
        $this->nombre = $genero;
    }

    function getPlataforma()
    {
        return $this->plataforma;
    }

    function setPlataforma($plataforma)
    {
        $this->nombre = $plataforma;
    }

    function getTrucos()
    {
        return $this->trucos;
    }
    function pintar()
    {
        echo ("<p>" . $this->getNombre() . "</p>");
        echo ("<p>" . $this->getGenero() . "</p>");
        echo ("<p>" . $this->getPlataforma() . "</p>");
        foreach ($this->getTrucos() as $truco) {
            echo ("<p>" . $truco->getNombre() . "</p>");
            echo ("<p>" . $truco->getDescripcion() . "</p>");

        }

    }

    function addTruco($truco)
    {
        array_push($this->trucos, $truco);
    }
    function delTruco($truco)
    {
        unset($this->trucos[array_search($truco, $this->trucos)]);
    }
}

$juego = new Juego("Fifa", "Futbol", "PS5");
$truco1 = new Truco("Truco1", "a");
$truco2 = new Truco("Truco2", "b");

$juego->addTruco($truco1);
$juego->addTruco($truco2);
$juego->pintar();
echo ("----------------------------------------------------------------");
$juego->delTruco($truco1);
$juego->pintar();