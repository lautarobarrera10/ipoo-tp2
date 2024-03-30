<?php

include "Persona.php";
include "Libro.php";

$lautaro = new Persona("Lautaro", "Barrera", "DNI", 42445635);
$cienAnios = new Libro(9780065023961, "Cien años de soledad", 1967, "Sudamericana de Buenos Aires", $lautaro, 523, "Entre la boda de José Arcadio Buendía con Amelia Iguarán hasta la maldición de Aureliano Babilonia transcurre todo un siglo. Cien años de soledad para una estirpe única, fantástica, capaz de fundar una ciudad tan especial como Macondo y de engendrar niños con cola de cerdo.");
echo "\n ✅ Libro creado\n";
echo $cienAnios;