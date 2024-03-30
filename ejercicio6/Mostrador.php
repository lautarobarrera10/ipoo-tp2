<?php

class Mostrador {
    private $numeroMostrador;
    private $tipoTramite;
    private $colaClientes;
    private $maximoCola;

    public function __construct($numeroMostrador, $tipoTramite, $colaClientes, $maximoCola){
        $this->numeroMostrador = $numeroMostrador;
        $this->tipoTramite = $tipoTramite;
        $this->colaClientes = $colaClientes;
        $this->maximoCola = $maximoCola;
    }

    public function __toString(){
        return
        "\n📑 Mostrador N°" . $this->getNumeroMostrador() . "\n" .
        "Tipo de trámite: " . $this->getTipoTramite() . "\n" .
        "Cola actual: " . $this->getColaClientes() . " clientes en espera \n" .
        "Máximo de fila: " . $this->getMaximoCola() . "\n";
    }

    public function getNumeroMostrador(){
        return $this->numeroMostrador;
    }

    public function setNumeroMostrador($value){
        $this->numeroMostrador = $value;
    }

    public function getTipoTramite(){
        return $this->tipoTramite;
    }

    public function setTipoTramite($value){
        $this->tipoTramite = $value;
    }

    public function getColaClientes(){
        return $this->colaClientes;
    }

    public function setColaClientes($value){
        $this->colaClientes = $value;
    }

    public function getMaximoCola(){
        return $this->maximoCola;
    }

    public function setMaximoCola($value){
        $this->maximoCola = $value;
    }

    public function atiende($tramite){
        $atiende = false;
        if ($tramite->getTipo() == $this->getTipoTramite()){
            $atiende = true;
        }
        return $atiende;
    }
}