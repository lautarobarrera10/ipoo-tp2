<?php

include "Persona.php";
include "Disquera.php";

$lautaro = new Persona("Lautaro", "Barrera", "DNI", 42445635);
$disquera = new Disquera(8,20,"abierta", "Esmeralda 1498", $lautaro);

echo $disquera;

var_dump($disquera->dentroHorarioAtencion(15,55));
var_dump($disquera->dentroHorarioAtencion(7,55));
var_dump($disquera->dentroHorarioAtencion(20,15));
var_dump($disquera->dentroHorarioAtencion(19,59));

$disquera->setEstado("cerrada");
echo $disquera->getEstado() . "\n";

$disquera->abrirDisquera(21,00);
echo $disquera->getEstado() . "\n";

$disquera->abrirDisquera(9,00);
echo $disquera->getEstado() . "\n";

$disquera->cerrarDisquera(16,55);
echo $disquera->getEstado() . "\n";

$disquera->cerrarDisquera(20,01);
echo $disquera->getEstado() . "\n";
