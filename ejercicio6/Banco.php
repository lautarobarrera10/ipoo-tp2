<?php

class Banco {
    private $mostradores;

    public function __construct($mostradores){
        $this->mostradores = $mostradores;
    }

    public function __toString(){
        return "\nMostradores: \n" . implode("\n", $this->getMostradores());
    }

    public function getMostradores(){
        return $this->mostradores;
    }

    public function setMostradores($value){
        $this->mostradores = $value;
    }

    public function mostradoresQueAtienden($tramite){
        $mostradores = [];
        for ($i=0; $i < count($this->getMostradores()); $i++) { 
            if ($this->getMostradores()[$i]->getTipoTramite() == $tramite->getTipo()){
                array_push($mostradores, $this->getMostradores()[$i]);
            }
        }
        return $mostradores;
    }

    public function mejorMostradorPara($tramite){
        $mostradoresQueAtiendenEsteTramite = $this->mostradoresQueAtienden($tramite);
        $mejorMostrador = $mostradoresQueAtiendenEsteTramite[0];
        for ($i=0; $i < count($mostradoresQueAtiendenEsteTramite); $i++) {
            $mostradorLleno = $mostradoresQueAtiendenEsteTramite[$i]->getColaClientes() == $mostradoresQueAtiendenEsteTramite[$i]->getMaximoCola();
            $esMejor = $mostradoresQueAtiendenEsteTramite[$i]->getColaClientes() < $mejorMostrador->getColaClientes();
            if ($esMejor && !$mostradorLleno){
                $mejorMostrador = $mostradoresQueAtiendenEsteTramite[$i];
            }
        }
        return $mejorMostrador;
    }

    public function atender($cliente){
        $rta = "";
        $tramite = $cliente->getTramite();
        $mejorMostrador = $this->mejorMostradorPara($tramite);
        $mostradorLleno = $mejorMostrador->getColaClientes() == $mejorMostrador->getMaximoCola();
        if ($mostradorLleno){
            $rta = "Será antendido en cuanto haya lugar en un mostrador";
        } else {
            $rta = "Avance por el mostrador N°" . $mejorMostrador->getNumeroMostrador();
            $mejorMostrador->setColaClientes($mejorMostrador->getColaClientes() + 1);
        }
        return $rta;
    }
}