<?php

class ChildrensMovie extends Movie
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $priceCode;

    /**
     * @param string $name
     * @param int $priceCode
     */
    public function __construct($name, $priceCode = null)
    {
        $this->name = $name;
        $this->priceCode = $priceCode;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function priceCode()
    {
        return Movie::CHILDRENS;
    }
}
