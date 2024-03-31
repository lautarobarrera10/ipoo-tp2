<?php

class Mostrador {
    private $numeroMostrador;
    private $tipoTramite;
    private $colaClientes;
    private $maximoCola;
    private $tramiteActual;
    private $tramitesAtendidos;

    public function __construct($numeroMostrador, $tipoTramite, $colaClientes, $maximoCola){
        $this->numeroMostrador = $numeroMostrador;
        $this->tipoTramite = $tipoTramite;
        $this->colaClientes = $colaClientes;
        $this->maximoCola = $maximoCola;
        $this->tramitesAtendidos = [];
    }

    public function __toString(){
        return
        "\n📑 Mostrador N°" . $this->getNumeroMostrador() . "\n" .
        "Tipo de trámite: " . $this->getTipoTramite() . "\n" .
        "Cola actual: " . count($this->getColaClientes()) . " cliente/s en espera \n" .
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

    public function getTramiteActual(){
        return $this->tramiteActual;
    }

    public function setTramiteActual($value){
        $this->tramiteActual = $value;
    }

    public function getTramitesAtendidos(){
        return $this->tramitesAtendidos;
    }

    public function setTramitesAtendidos($value){
        $this->tramitesAtendidos = $value;
    }

    public function atiende($tramite){
        $atiende = false;
        if ($tramite->getTipo() == $this->getTipoTramite()){
            $atiende = true;
        }
        return $atiende;
    }

    public function sumarTramiteALaCola($tramite){
        $tramitesActuales = $this->getColaClientes();
        array_push($tramitesActuales, $tramite);
        $this->setColaClientes($tramitesActuales);
    }

    public function ingresarTramite(){
        $rta = "";
        $tramitesActuales = $this->getColaClientes();
        if (!empty($tramitesActuales)){
            $tramitesActuales[0]->setEstado("abierto");
            $this->setTramiteActual($tramitesActuales[0]);
            $rta = "✅ Trámite abierto";
        } else {
            $rta = "❌ No hay trámites en la cola";
        }
        return $rta;
    }

    public function cerrarTramite(){
        $rta = "";
        if ($this->getTramiteActual()->getEstado() == "abierto"){
            // Trámite actual estado cerrado
            $this->getTramiteActual()->setEstado("cerrado");
            // Todos los trámites
            $tramites = $this->getColaClientes();
            // Le agregamos la fecha y hora de cierre al trámite
            $this->getTramiteActual()->setFechaCierre(date("d/m/Y"));
            $this->getTramiteActual()->setHoraResolucion(date("G:i"));
            // Agregamos el trámite actual a los trámites atendidos
            $tramitesAtendidos = $this->getTramitesAtendidos();
            array_push($tramitesAtendidos, $this->getTramiteActual());
            $this->setTramitesAtendidos($tramitesAtendidos);
            // Quitamos el trámite atendido de la cola de trámites
            array_shift($tramites);
            $this->setColaClientes($tramites);            
            // Respondemos satisfactoriamente
            $rta = "✅ Trámite cerrado";
        } else {
            $rta = "❌ Para cerrar un trámite primero debe abrirlo";
        }
        return $rta;
    }

    /**
     * Retorna los trámite resueltos en un día dado
     * @param date $dia
     * @return int
     */
    public function tramitesResueltos($dia){
        $tramitesResueltosEsteDia = 0;
        $tramitesResueltos = $this->getTramitesAtendidos();
        for ($i=0; $i < count($tramitesResueltos); $i++) { 
            if ($tramitesResueltos[$i]->getFechaCierre() == $dia){
                $tramitesResueltosEsteDia++;
            }
        }
        return $tramitesResueltosEsteDia;
    }

    /**
     * retorna la cantidad promedio de trámites resueltos por día en este mes.
     * @return float
     */
    public function cantTramitesAtendidosMes(){
        $totalResueltasEnElMes = 0;
        $mesActual = date("Y-m");
        $diasDelMesTranscurridos = intval(date("j"));
        for ($i=1; $i <= $diasDelMesTranscurridos; $i++) { 
            $dia = date("d/m/Y", strtotime($mesActual . "-" . $i));
            for ($j=0; $j < count($this->getTramitesAtendidos()); $j++) {
                if ($this->getTramitesAtendidos()[$j]->getFechaCierre() == $dia){
                    $totalResueltasEnElMes++;
                }
            }
        }
        $promedioPorDia = $totalResueltasEnElMes / $diasDelMesTranscurridos;
        return $promedioPorDia;
    }
}