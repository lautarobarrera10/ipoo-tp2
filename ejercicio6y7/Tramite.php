<?php

class Tramite {
    private $tipo;
    private $estado;
    private $fechaCreacion;
    private $horaCreacion;
    private $fechaCierre;
    private $horaResolucion;
    private $cliente;

    /**
     * @param string $tipo
     * @param obj $cliente
     */
    public function __construct($tipo, $cliente){
        $this->tipo = $tipo;
        $this->cliente = $cliente;
        $this->estado = "pendiente";
        $this->fechaCreacion = date("d/m/Y");
        $this->horaCreacion = date("G:i");
    }

    public function __toString(){
        return
        "Cliente: " . $this->getCliente()->getNombre() . "\n" .
        "Tipo de trámite: " . $this->getTipo() . "\n" .
        "Estado: " . $this->getEstado() . "\n" .
        "Fecha de creación: " . $this->getFechaCreacion() . "\n" .
        "Hora de creación: " . $this->getHoraCreacion() . "\n" .
        "Fecha de cierre: " . $this->getFechaCierre() . "\n" .
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

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($value){
        $this->estado = $value;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setCliente($value){
        $this->cliente = $value;
    }

    public function getFechaCreacion(){
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($value){
        $this->fechaCreacion = $value;
    }

    public function getFechaCierre(){
        return $this->fechaCierre;
    }

    public function setFechaCierre($value){
        $this->fechaCierre = $value;
    }
}