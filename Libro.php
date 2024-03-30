<?php

class Libro {
    private $ISBN;
    private $titulo;
    private $anioDeEdicion;
    private $editorial;
    private $autor;
    private $paginas;
    private $sinopsis;

    public function __construct($ISBN, $titulo, $anioDeEdicion, $editorial, $autor, $paginas, $sinopsis){
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anioDeEdicion = $anioDeEdicion;
        $this->editorial = $editorial;
        $this->autor = $autor;
        $this->paginas = $paginas;
        $this->sinopsis = $sinopsis;
    }

    public function __toString(){
        return
        "\n📙 Libro\n" .
        "ISBN: " . $this->getISBN() . "\n" .
        "Título: " . $this->getTitulo() . "\n" .
        "Año de edición: " . $this->getAnioDeEdicion() . "\n" .
        "Editorial: " . $this->getEditorial() . "\n" .
        "Autor: \n" . $this->getAutor() .
        "Páginas: " . $this->getPaginas() . "\n" .
        "Sinopsis: " . $this->getSinopsis() . "\n\n";
    }

    public function getISBN(){
        return $this->ISBN;
    }

    public function setISBN($value){
        $this->ISBN = $value;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($value){
        $this->titulo = $value;
    }

    public function getAnioDeEdicion(){
        return $this->anioDeEdicion;
    }

    public function setAnioDeEdicion($value){
        $this->anioDeEdicion = $value;
    }

    public function getEditorial(){
        return $this->editorial;
    }

    public function setEditorial($value){
        $this->editorial = $value;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($value){
        $this->autor = $value;
    }

    public function getPaginas(){
        return $this->paginas;
    }

    public function setPaginas($value){
        $this->paginas = $value;
    }

    public function getSinopsis(){
        return $this->sinopsis;
    }

    public function setSinopsis($value){
        $this->sinopsis = $value;
    }

    public function perteneceEditorial($peditorial){
        $pertenece = false;
        if ($this->getEditorial() == $peditorial){
            $pertenece = true;
        }
        return $pertenece;
    }

    public function aniosDesdeEdicion(){
        $anioActual = intval(date("o"));
        return $anioActual - $this->getAnioDeEdicion();
    }
}