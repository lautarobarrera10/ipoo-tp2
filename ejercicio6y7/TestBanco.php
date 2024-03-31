<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

include "Mostrador.php";
include "Banco.php";
include "Tramite.php";
include "Cliente.php";

$mostrador1 = new Mostrador(1, "retiro", [], 10);
$mostrador2 = new Mostrador(2, "deposito", [], 2);
$mostrador3 = new Mostrador(3, "deposito", [], 5);
$mostrador4 = new Mostrador(4, "deposito", [], 10);
$mostrador5 = new Mostrador(5, "transferencia", [], 10);

$mostradores = [$mostrador1, $mostrador2, $mostrador3, $mostrador4, $mostrador5];

$bancoGalicia = new Banco($mostradores);

echo "\n✅ Banco creado \n";
echo $bancoGalicia . "\n";

$clienteLautaro = new Cliente(1, "Lautaro");
$clienteCamila = new Cliente(2, "Camila");

$tramite1 = new Tramite("retiro", $clienteLautaro);
$tramite2 = new Tramite("retiro", $clienteCamila);

echo $bancoGalicia->atender($tramite1);
echo $bancoGalicia->atender($tramite2);
echo $bancoGalicia . "\n";

echo $mostrador1->ingresarTramite() . "\n";
echo $tramite1 . "\n";

echo $mostrador1->cerrarTramite() . "\n";
echo $tramite1 . "\n";

echo $mostrador1->ingresarTramite() . "\n";
echo $tramite2 . "\n";

echo $mostrador1->cerrarTramite() . "\n";
echo $tramite2 . "\n";

echo $mostrador1->ingresarTramite() . "\n";

echo "\nTrámites atendidos en este mostrador: \n";
echo implode("\n" ,$mostrador1->getTramitesAtendidos()) . "\n";

echo "\nTrámites atendidos hoy en el mostrador 1: \n";
echo  $mostrador1->tramitesResueltos(date("d/m/Y")) . "\n\n";

echo "\nTrámites atendidos hoy en el mostrador 2: \n";
echo  $mostrador2->tramitesResueltos(date("d/m/Y")) . "\n\n";

// nuevo trámite para probar con fecha distinta para ver si suma
$tramite3 = new Tramite("retiro", $clienteLautaro);
$bancoGalicia->atender($tramite3);
$mostrador1->ingresarTramite();
$mostrador1->cerrarTramite();
$mostrador1->getTramitesAtendidos()[2]->setFechaCreacion("30/03/2024");
$mostrador1->getTramitesAtendidos()[2]->setFechaCierre("30/03/2024");

echo implode("\n", $mostrador1->getTramitesAtendidos());

echo "\nPromedio de trámites resueltos por día durante el mes en el mostrador 1: \n";
echo  $mostrador1->cantTramitesAtendidosMes() . "\n\n";