<?php

class Persona {
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre,$apellido,$tipoDocumento,$numeroDocumento){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }

    public function __toString(){
        return
        "Nombre: " . $this->getNombre() . "\n" .
        "Apellido: " . $this->getApellido() . "\n" .
        "Tipo y número de documento: " . $this->getTipoDocumento() . " " . $this->getNumeroDocumento() . "\n";
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($value){
        $this->nombre = $value;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($value){
        $this->apellido = $value;
    }

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($value){
        $this->tipoDocumento = $value;
    }

    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento($value){
        $this->numeroDocumento = $value;
    }
}