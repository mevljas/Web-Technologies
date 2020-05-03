<?php
// anonimna funkcija
// V spremenljivki a je zapisana refernca na funkcijo.
$a = function ($name = "World") {
    return "Hello $name!";
};

echo $a("Marija");



$vars = [
    "foo" => 10,
    "bar" => 20
];

extract($vars);

$baz = $foo + $bar;

echo "$foo + $bar = $baz";
