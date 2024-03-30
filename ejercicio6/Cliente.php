<?php

class Cliente {
    private $numeroCliente;
    private $tramite;

    public function __construct($numeroCliente, $tramite){
        $this->numeroCliente = $numeroCliente;
        $this->tramite = $tramite;
    }

    public function __toString(){
        return
        "🫅 Cliente N°" . $this->getNumeroCliente() . "\n" .
        "Tramite: \n" . $this->getTramite();
    }

    public function getNumeroCliente(){
        return $this->numeroCliente;
    }

    public function setNumeroCliente($value){
        $this->numeroCliente = $value;
    }

    public function getTramite(){
        return $this->tramite;
    }

    public function setTramite($value){
        $this->tramite = $value;
    }
}