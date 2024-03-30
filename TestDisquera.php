<?php

include "Persona.php";
include "Disquera.php";

$lautaro = new Persona("Lautaro", "Barrera", "DNI", 42445635);
$disquera = new Disquera(8,20,"abierta", "Esmeralda 1498", $lautaro);

echo $disquera;