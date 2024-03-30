<?php

class CuentaBancaria {
    private $numeroCuenta;
    private $cliente;
    private $saldoActual;
    private $interesAnual;

    public function __construct($numeroCuenta, $cliente, $saldoActual, $interesAnual){
        $this->numeroCuenta = $numeroCuenta;
        $this->cliente = $cliente;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    public function __toString(){
        return
        "Número de cuenta: " . $this->getNumeroCuenta() . "\n" .
        "Cliente: \n" . $this->getCliente() .
        "Saldo actual: $" . number_format($this->getSaldoActual(), 2, ',', '.') . "\n" .
        "Interés anual: " . $this->getInteresAnual() . "%\n";
    }

    public function getNumeroCuenta(){
        return $this->numeroCuenta;
    }

    public function setNumeroCuenta($value){
        $this->numeroCuenta = $value;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setCliente($value){
        $this->cliente = $value;
    }

    public function getSaldoActual(){
        return $this->saldoActual;
    }

    public function setSaldoActual($value){
        $this->saldoActual = $value;
    }

    public function getInteresAnual(){
        return $this->interesAnual;
    }

    public function setInteresAnual($value){
        $this->interesAnual = $value;
    }

    public function actualizarSaldo(){
        $incrementoAnual = $this->getSaldoActual() * $this->getInteresAnual() / 100;
        $incrementoDiario = $incrementoAnual / 365;
        $this->setSaldoActual($this->getSaldoActual() + $incrementoDiario);
    }

    public function depositar($cant){
        $this->setSaldoActual($this->getSaldoActual() + $cant);
    }

    public function retirar($cant){
        $rta = false;
        if ($cant <= $this->getSaldoActual()){
            $this->setSaldoActual($this->getSaldoActual() - $cant);
            $rta = true;
        }
        return $rta;
    }
}