<?php

include "Mostrador.php";
include "Banco.php";
include "Tramite.php";
include "Cliente.php";

$mostrador1 = new Mostrador(1, "retiro", 6, 10);
$mostrador2 = new Mostrador(2, "retiro", 2, 2);
$mostrador3 = new Mostrador(3, "retiro", 3, 5);
$mostrador4 = new Mostrador(4, "deposito", 2, 10);
$mostrador5 = new Mostrador(5, "transferencia", 10, 10);

$mostradores = [$mostrador1, $mostrador2, $mostrador3, $mostrador4, $mostrador5];

$bancoGalicia = new Banco($mostradores);

echo "\n✅ Banco creado \n";
echo $bancoGalicia . "\n";

$tramite1 = new Tramite("deposito", 8, 9);
$tramite2 = new Tramite("retiro", 8, 9);

echo "\n❓ ¿El mostrador 2 (retiro) atiende el trámite 1 (deposito)? \n";
var_dump($mostrador2->atiende($tramite1));

echo "\n❓ ¿El mostrador 3 (deposito) atiende el trámite 1 (deposito)? \n";
var_dump($mostrador3->atiende($tramite1));

echo "\nMostradores que atienden depositos: \n";
$mostradoresAtiendenDepositos = $bancoGalicia->mostradoresQueAtienden($tramite1);
for ($i=0; $i < count($mostradoresAtiendenDepositos); $i++) { 
    echo $mostradoresAtiendenDepositos[$i];
}

echo "\nMostradores que atienden retiros: \n";
$mostradoresAtiendenRetiros = $bancoGalicia->mostradoresQueAtienden($tramite2);
for ($i=0; $i < count($mostradoresAtiendenRetiros); $i++) { 
    echo $mostradoresAtiendenRetiros[$i];
}

echo "\n✅ Mejor mostrador para retiros: \n";
echo $bancoGalicia->mejorMostradorPara($tramite2);

$cliente1 = new Cliente(1, $tramite2);
echo "\n" . $cliente1 . "\n";
echo $bancoGalicia->atender($cliente1) . "\n";

$tramite3 = new Tramite("transferencia", 10, 11);
$cliente2 = new Cliente(2, $tramite3);
echo "\n" . $cliente2 . "\n";
echo $bancoGalicia->atender($cliente2) . "\n";

// Verificamos que el mostrador N°3 ahora tenga 4 clientes en la fila, en vez de 3.
echo $bancoGalicia;