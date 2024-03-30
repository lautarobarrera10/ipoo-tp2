<?php

include "Libro.php";
include "Lectura.php";

$cienAnios = new Libro (9780065023961, "Cien años de soledad", 1967, "Sudamericana de Buenos Aires", "Gabriel García Márquez", 523, "Entre la boda de José Arcadio Buendía con Amelia Iguarán hasta la maldición de Aureliano Babilonia transcurre todo un siglo. Cien años de soledad para una estirpe única, fantástica, capaz de fundar una ciudad tan especial como Macondo y de engendrar niños con cola de cerdo.");

$lectura1 = new Lectura(523, $cienAnios);
echo $lectura1;

$retorno = $lectura1->siguientePagina();
echo "Retorno:" . $retorno . "\n";
echo $lectura1;

$retorno = $lectura1->retrocederPagina();
echo "Retorno:" . $retorno . "\n";
echo $lectura1;


echo "\n 📍 Probando método irPagina(x) \n";

$retorno = $lectura1->irPagina(55);
echo "Retorno:" . $retorno . "\n";
echo $lectura1;

$retorno = $lectura1->irPagina(600);
echo "Retorno:" . $retorno . "\n";
echo $lectura1;

$retorno = $lectura1->irPagina(0);
echo "Retorno:" . $retorno . "\n";
echo $lectura1;