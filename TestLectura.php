<?php

include "Libro.php";
include "Lectura.php";

$cienAnios = new Libro (9780065023961, "Cien años de soledad", 1967, "Sudamericana de Buenos Aires", "Gabriel García Márquez", 523, "Entre la boda de José Arcadio Buendía con Amelia Iguarán hasta la maldición de Aureliano Babilonia transcurre todo un siglo. Cien años de soledad para una estirpe única, fantástica, capaz de fundar una ciudad tan especial como Macondo y de engendrar niños con cola de cerdo.");
$sarmiento = new Libro (9789877692341, "Sarmiento", 2023, "Sudamericana de Buenos Aires", "Daniel Balmaceda", 420, "Habla de la guerra indeseada a la que no podía renunciar, de las relaciones clandestinas, del respeto inesperado por el antagonista, del desprecio por los que más se le parecen, de los abrazos siempre esquivos, de las derrotas del poder. «Caparrós es una manera de ver y entender el mundo.");
$martinFierro = new Libro (9789502317441, "Martín Fierro", 1872, "Eudeba", "José Hernández", 162, "Un gaucho honrado y buen hombre pierde su familia y todo lo que tiene al ser alistado a la fuerza para luchar contra los indios. Al volver, y luego de buscar sin éxito a su mujer e hijos, la desesperación lo vuelve 'gaucho malo', matando en un duelo a un gaucho negro.");

$librosLeidos = [$sarmiento, $martinFierro];

$lectura1 = new Lectura(23, $cienAnios, $librosLeidos);
echo $lectura1;

echo "\n❔ Leyó 'Sarmiento'? \n";
var_dump($lectura1->libroLeido("Sarmiento"));

echo "\n❔ Leyó 'Piense y Hagase Rico'? \n";
var_dump($lectura1->libroLeido("Piense y Hagase Rico"));

echo "\n❔ Sinopsis de 'Piense y Hagase Rico' \n";
echo $lectura1->darSinopsis("Piense y Hagase Rico") . "\n";

echo "\n❔ Sinopsis de 'Sarmiento' \n";
echo $lectura1->darSinopsis("Sarmiento") . "\n";

echo "\n❔ Sinopsis de 'Cien años de soledad' \n";
echo $lectura1->darSinopsis("Cien años de soledad") . "\n";

echo "\n📖 Libros editados en  2023 \n";
$librosEditados2023 = $lectura1->leidosAniosEdicion(2023);
for ($i=0; $i < count($librosEditados2023); $i++) { 
    echo $librosEditados2023[$i];
}

echo "\n📖 Libros editados en  2020 \n";
$librosEditados2020 = $lectura1->leidosAniosEdicion(2020);
if (empty($librosEditados2020)){
    echo "No ha leido libros editados en 2020\n";
} else {
    for ($i=0; $i < count($librosEditados2020); $i++) { 
        echo $librosEditados2020[$i];
    }
}

echo "\n📖 Libros leidos de José Hernández: \n";
$leidosJoseHernandez = $lectura1->leidosAutor("José Hernández");
if (empty($leidosJoseHernandez)){
    echo "No ha leido libros de este autor. \n";
} else {
    for ($i=0; $i < count($leidosJoseHernandez); $i++) { 
        echo $leidosJoseHernandez[$i];
    }
}

echo "\n📖 Libros leidos de Pablo Neruda: \n";
$leidosNeruda = $lectura1->leidosAutor("Pablo Neruda");
if (empty($leidosNeruda)){
    echo "No ha leido libros de este autor. \n";
} else {
    for ($i=0; $i < count($leidosNeruda); $i++) { 
        echo $leidosNeruda[$i];
    }
}


// $retorno = $lectura1->siguientePagina();
// echo "Retorno:" . $retorno . "\n";
// echo $lectura1;

// $retorno = $lectura1->retrocederPagina();
// echo "Retorno:" . $retorno . "\n";
// echo $lectura1;


// echo "\n 📍 Probando método irPagina(x) \n";

// $retorno = $lectura1->irPagina(55);
// echo "Retorno:" . $retorno . "\n";
// echo $lectura1;

// $retorno = $lectura1->irPagina(600);
// echo "Retorno:" . $retorno . "\n";
// echo $lectura1;

// $retorno = $lectura1->irPagina(0);
// echo "Retorno:" . $retorno . "\n";
// echo $lectura1;