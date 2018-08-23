<?php

class Celular
{

    private $marca;
    private $marcaDisponibles = ['Motorola', 'Iphone'];

    public function __construct($marca){
        $this->marca = $marca;
    }

    public function setMarca($pepe){
        foreach ($this->marcaDisponibles as $value) {
            if ($value == $pepe) {
                $this->marca = $pepe;
                return;
            }
        }

        echo "Che la marca no esta disponible";

    }

    public function getMarca(){
        return $this->marca;
    }

    public function llamar(){
        echo "estoy llamando";
    }






} 




class Motorola extends Celular
{
    protected $modelo;

    function __construct($marca,$modelo)
    {
        parent::__construct();
        $this->modelo = $modelo;
    }

    public function llamar(){
        echo "carlos";
    }
}


?>
