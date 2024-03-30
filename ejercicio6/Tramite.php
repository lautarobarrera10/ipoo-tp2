<?php

class Tramite {
    private $tipo;
    private $horaCreacion;
    private $horaResolucion;

    public function __construct($tipo, $horaCreacion, $horaResolucion){
        $this->tipo = $tipo;
        $this->horaCreacion = $horaCreacion;
        $this->horaResolucion = $horaResolucion;
    }

    public function __toString(){
        return
        "Tipo de trámite: " . $this->getTipo() . "\n" .
        "Hora de creación: " . $this->getHoraCreacion() . "\n" .
        "Hora de resolución: " . $this->getHoraResolucion() . "\n";
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($value){
        $this->tipo = $value;
    }

    public function getHoraCreacion(){
        return $this->horaCreacion;
    }

    public function setHoraCreacion($value){
        $this->horaCreacion = $value;
    }

    public function getHoraResolucion(){
        return $this->horaResolucion;
    }

    public function setHoraResolucion($value){
        $this->horaResolucion = $value;
    }
}