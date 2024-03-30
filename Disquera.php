<?php

class Disquera {
    private $horaDesde;
    private $horaHasta;
    private $estado;
    private $direccion;
    private $owner;

    public function __construct($horaDesde,$horaHasta,$estado,$direccion,$owner){
        $this->horaDesde = $horaDesde;
        $this->horaHasta = $horaHasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->owner = $owner;
    }

    public function __toString(){
        return
        "Horario de apertura: " . $this->getHoraDesde() . "hs\n" .
        "Horario de cierre: " . $this->getHoraHasta() . "hs\n" .
        "Estado: " . $this->getEstado() . "\n" .
        "Dirección: " . $this->getDireccion() . "\n" .
        "Dueño: \n" . $this->getOwner() . "\n";
    }

    public function getHoraDesde(){
        return $this->horaDesde;
    }

    public function setHoraDesde($value){
        $this->horaDesde = $value;
    }

    public function getHoraHasta(){
        return $this->horaHasta;
    }

    public function setHoraHasta($value){
        $this->horaHasta = $value;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($value){
        $this->estado = $value;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($value){
        $this->direccion = $value;
    }

    public function getOwner(){
        return $this->owner;
    }

    public function setOwner($value){
        $this->owner = $value;
    }

    public function dentroHorarioAtencion($hora,$minutos){
        $dentroHorario = false;
        if ($hora * 60 + $minutos < $this->getHoraHasta() * 60 && $hora * 60 + $minutos > $this->getHoraDesde() * 60){
            $dentroHorario = true;
        }
        return $dentroHorario;
    }

    public function abrirDisquera($hora,$minutos){
        if($this->dentroHorarioAtencion($hora, $minutos)){
            $this->setEstado("abierta");
        }
    }

    public function cerrarDisquera($hora, $minutos){
        if (!$this->dentroHorarioAtencion($hora, $minutos)){
            $this->setEstado("cerrada");
        }
    }
}