<?php

class Customer
{
    // Declaring the customer name
    /**
     * @var string
     */
    private $name;

    // importing the rental model
    /**
     * @var Rental[]
     */
    private $rentals;

    // customer constructor
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    // creating the customer name
    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    //function that adds rentals to the array of rentals, wanting the movie model and days rented passed in
    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function getRenterPoints()
    {
        $frequentRenterPoints = 0;

        foreach ($this->rentals as $rental)
        {
            // adding points to the frequentRenterPoints variable
            $frequentRenterPoints++;
            // if a movie is rented for more than one day a point is earned and if the movie is a NEW_RELEASE a point is earned. 2 points for NEW_RELEASE's
            if ($rental->movie()->priceCode() === Movie::NEW_RELEASE && $rental->daysRented() > 1) {
                $frequentRenterPoints++;
            }
        }
        return $frequentRenterPoints;
    }

    // function that prints the text statement - move this to it's own file and break down totalAmount & frequentRenterPoints into separate functions
    /**
     * @return string
     */
    public function statement()
    {
        // declaring the beginning of the transaction
        $totalAmount = 0;

        // header for the statement
        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        // looping through the rentals array
        foreach ($this->rentals as $rental) {
            // setting the amount for each rental in the array
            $thisAmount = 0;
                       
            // calculating the price based on the priceCode passed in: REGULAR, NEW_RELEASE OR CHILDRENS
            switch($rental->movie()->priceCode()) {
                case Movie::REGULAR:
                    // REGULAR rental is 2 for a 2 days
                    $thisAmount += 2;
                    // if the rental is more than 2 days, we add 1.5 to the amount daily
                    if ($rental->daysRented() > 2) {
                        $thisAmount += ($rental->daysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    // NEW_RELEASE movies are 3 daily
                    $thisAmount += $rental->daysRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    // CHILDRENS rental is 1.5 for 3 days
                    $thisAmount += 1.5;
                    // if the rental is more than 3 days, we add 1.5 to the amount daily
                    if ($rental->daysRented() > 3) {
                        $thisAmount += ($rental->daysRented() - 3) * 1.5;
                    }
                    break;
            }

            // add the amount for each rental in the array to the total amount
            $totalAmount += $thisAmount;

            // prints movie name and the amount for each rental
            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $thisAmount . PHP_EOL;
        }

        // prints the amount for the total sale
        $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
        // prints the points amount for the sale
        $result .= 'You earned ' . $this->getRenterPoints() . ' frequent renter points' . PHP_EOL;

        return $result;
    }
}
