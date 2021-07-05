<?php

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;


    // Rental constructor
    /**
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    // creates a new instance of a movie... name and genre
    /**
     * @return Movie
     */
    public function movie()
    {
        return $this->movie;
    }

    // adds the number of days rented to the rental
    /**
     * @return int
     */
    public function daysRented()
    {
        return $this->daysRented;
    }
}
