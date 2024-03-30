<?php

class Lectura {
    private $paginaActual;
    private $libro;
    private $librosLeidos;

    public function __construct($paginaActual, $libro, $librosLeidos){
        $this->paginaActual = $paginaActual;
        $this->libro = $libro;
        $this->librosLeidos = $librosLeidos;
    }

    public function __toString(){
        $titulosLibrosLeidos = [];
        for ($i=0; $i < count($this->getLibrosLeidos()); $i++) {
            array_push($titulosLibrosLeidos, $this->getLibrosLeidos()[$i]->getTitulo());
        }
        return
        "Libro: " . $this->getLibro() .
        "Página actual: " . $this->getPaginaActual() . "\n" .
        "Libros leidos: " . implode(", ", $titulosLibrosLeidos) . "\n";
        
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

    public function getLibrosLeidos(){
        return $this->librosLeidos;
    }

    public function setLibrosLeidos($value){
        $this->librosLeidos = $value;
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

    public function libroLeido($titulo){
        $rta = false;
        for ($i=0; $i < count($this->getLibrosLeidos()); $i++) { 
            if ($this->getLibrosLeidos()[$i]->getTitulo() == $titulo){
                $rta = true;
            }
        }
        return $rta;
    }

    public function darSinopsis($titulo){
        $rta = "Libro no encontrado";
        for ($i=0; $i < count($this->getLibrosLeidos()); $i++) { 
            if ($this->getLibrosLeidos()[$i]->getTitulo() == $titulo){
                $rta = $this->getLibrosLeidos()[$i]->getSinopsis();
            }
        }
        if ($this->getLibro()->getTitulo() == $titulo){
            $rta = $this->getLibro()->getSinopsis();
        }
        return $rta;
    }

    public function leidosAniosEdicion($anio){
        $rta = [];
        for ($i=0; $i < count($this->getLibrosLeidos()); $i++) { 
            if ($this->getLibrosLeidos()[$i]->getAnioDeEdicion() == $anio){
                array_push($rta, $this->getLibrosLeidos()[$i]);
            }
        }
        return $rta;
    }

    public function leidosAutor($autor){
        $rta = [];
        for ($i=0; $i < count($this->getLibrosLeidos()); $i++) { 
            if ($this->getLibrosLeidos()[$i]->getAutor() == $autor){
                array_push($rta, $this->getLibrosLeidos()[$i]);
            }
        }
        return $rta;
    }
}