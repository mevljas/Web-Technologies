<?php

echo "Hello World!"; 

$a = 10;
$b = 20;
$c = $a + $b;

echo $c;

// če uporabljamo kostante, ni treba pisat $ znaka.


$a = 10;
$b = "20";
$c = $a + $b;

echo $c;
// ševedno dela, ker ima php šibke tipe - sešteva


$a = 10;
$b = "20";
$c = $a . $b;

echo $c;
// kontatinacija


var_dump($c);
// uporabljamo ko kej razvijamo.  Izpiše vrednsot določene spremrenljvike in tudi tip.


// interpolacija nizov - vrednosti spremenlnivk se zamenjajo
echo "Vsota $a in $b = $c";

// uporaba enojnih narekovajev - nizi se ne intrepolorajo.
echo 'Vsota $a in $b = $c';




// asociativna polja
// star način
$polje = array(1, 2, 3);

echo $polje[0];


// novejši način
$polje = [1, 2, 3];

// indekse lahko specificiramo.
// dolocimo indeks in vrednost
$polje = [
    0 => 1,
    1 => 2,
    2 => 3
];



// var_dump($polje[0]);


//for zanka
//count je kot lenght
for ($i=0; $i < count($polje); $i++) { 
    echo "$i -> $polje[$i]\n";
}


//kljuci so lahko karkoli
$polje = [
    0 => 1,
    1 => 2,
    2 => 3,
    "tri" => 4
];


//uporabimo foreach zanko
foreach ($polje as $key => $value) {
    echo "$key -> $value\n";
}

$polje = [
    0 => 1,
    1 => 2,
    2 => 3,
    "tri" => 4
];

var_dump($polje);
//brisanje elemnta
unset($polje["tri"]);
var_dump($polje);


 

// Če se naš dokument konča s php kodo, lahko closing tag izpustimo
?>