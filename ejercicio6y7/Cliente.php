<?php

class Cliente {
    private $numeroCliente;
    private $nombre;

    public function __construct($numeroCliente, $nombre){
        $this->numeroCliente = $numeroCliente;
        $this->nombre = $nombre;
    }

    public function __toString(){
        return
        "🫅 Cliente N°" . $this->getNumeroCliente() . "\n" .
        "Nombre: \n" . $this->getNombre();
    }

    public function getNumeroCliente(){
        return $this->numeroCliente;
    }

    public function setNumeroCliente($value){
        $this->numeroCliente = $value;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($value){
        $this->nombre = $value;
    }
}