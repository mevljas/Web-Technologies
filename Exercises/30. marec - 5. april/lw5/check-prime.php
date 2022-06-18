<!DOCTYPE html>

<meta charset="UTF-8" />
<title>Answering the prime question</title>

<?php

// Complete function isPrime($number) by implementing a simple algorithm
function isPrime($number) {
    $counter = 0;
    for ($i=2; $i < $number; $i++) { 
        if( $number % $i == 0){
            $counter++;
        }
    }
    return $counter == 0;
}

$number = $_GET["number"];

?>

<!-- Odpremo značko, ki zgolj izpiše vrednost spremenljivke. -->
<h1>Checking if <?=$number?> is prime</h1>

<p><?php

if (isPrime($number)) {
    echo "Yes, $number is a prime number.";
} else {
    echo "No, $number is not prime.";
}

?></p>
