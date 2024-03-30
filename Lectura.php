<?php

class Lectura {
    private $paginaActual;
    private $libro;

    public function __construct($paginaActual, $libro){
        $this->paginaActual = $paginaActual;
        $this->libro = $libro;
    }

    public function __toString(){
        return
        "Libro: " . $this->getLibro() .
        "Página actual: " . $this->getPaginaActual() . "\n";
    }

    public function getPaginaActual(){
        return $this->paginaActual;
    }

    public function setPaginaActual($value){
        $this->paginaActual = $value;
    }

    public function getLibro(){
        return $this->libro;
    }

    public function setLibro($value){
        $this->libro = $value;
    }

    public function siguientePagina(){
        $paginaRetorno = $this->getPaginaActual();
        if ($this->getPaginaActual() < $this->getLibro()->getPaginas()){
            $this->setPaginaActual($this->getPaginaActual() + 1);
            $paginaRetorno = $paginaRetorno - 1;
        }
        return $paginaRetorno;
    }

    public function retrocederPagina(){
        if ($this->getPaginaActual() > 1){
            $this->setPaginaActual($this->getPaginaActual() - 1);
        }
        return $this->getPaginaActual();
    }

    public function irPagina($x){
        $rta = $this->getPaginaActual();
        if ($x > 0 && $x <= $this->getLibro()->getPaginas()){
            $this->setPaginaActual($x);
        }
        return $rta;
    }
}