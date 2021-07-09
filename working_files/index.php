<?php

require_once('Movie.php');
require_once('ChildrensMovie.php');
require_once('RegularMovie.php');
require_once('NewReleaseMovie.php');
require_once('Rental.php');
require_once('Customer.php');

$rental1 = new Rental(
    new ChildrensMovie(
        'Back to the Future'
    ), 4
);

$rental2 = new Rental(
    new RegularMovie(
        'Office Space',
    ), 3
);

$rental3 = new Rental(
    new NewReleaseMovie(
        'The Big Lebowski',
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();
echo $customer->htmlStatement();
