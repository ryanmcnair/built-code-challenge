<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function statement()
    {
        $totalAmount = 0;
        $totalPoints = 0;

        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $totalAmount += $rental->getPrice();
            $totalPoints += $rental->getPoints();
            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $rental->getPrice() . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
        $result .= 'You earned ' . $totalPoints . ' frequent renter points' . PHP_EOL;

        return $result;
    }
    
    public function htmlStatement()
    {
        $totalAmount = 0;
        $totalPoints = 0;

        $result = '<h1>Rental Record for <em>' . $this->name() . '</em></h1>' . PHP_EOL;

        $result .= '<ul>' . PHP_EOL;
        foreach ($this->rentals as $rental) {
            $totalAmount += $rental->getPrice();
            $totalPoints += $rental->getPoints();
            $result .= '    <li>' . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . ' - ' . $rental->getPrice(). '</li>' . PHP_EOL;
        }
        $result .= '</ul>' . PHP_EOL;
        $result .= '<p>Amount owed is <em>' . $totalAmount . '</em></p>' . PHP_EOL;
        $result .= '<p>You earned <em>' . $totalPoints . '</em> frequent renter points</p>' . PHP_EOL;

        return $result;
    }
}
