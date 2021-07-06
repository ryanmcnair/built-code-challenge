<?php

class Movie
{
    // I believe this is defining the genres as integers for the switch case function in the Customer model. Also used as priceCode below
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $priceCode;

    // movie constructor
    /**
     * @param string $name
     * @param int $priceCode
     */
    public function __construct($name, $priceCode)
    {
        $this->name = $name;
        $this->priceCode = $priceCode;
    }

    // gives a name to a movie
    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    // priceCode is passed a genre declared above in order to calculate the amount to charge for a rental of a length of time
    /**
     * @return int
     */
    public function priceCode()
    {
        return $this->priceCode;
    }
}
