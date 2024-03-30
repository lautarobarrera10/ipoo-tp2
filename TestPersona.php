<?php

include "Persona.php";
include "CuentaBancaria.php";

$lautaro = new Persona("Lautaro", "Barrera", "DNI", 42445635);
echo "\n✅ Persona creada \n";
echo $lautaro;

$cuentaLautaro = new CuentaBancaria(1, $lautaro, 10000, 80);
echo "\n✅ Cuenta creada \n";
echo $cuentaLautaro;