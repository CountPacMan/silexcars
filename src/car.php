<?php
class Car
{
    public $make_model;
    private $price;
    public $miles;
    public $photo;

    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100);
    }

    function worthMileage($max_miles)
    {
        return $this->miles < ($max_miles + 1000);
    }

    function __construct($car_make, $car_photo, $car_price, $car_miles)
    {
        $this->make_model = $car_make;
        $this->photo = $car_photo;
        $this->price = $car_price;
        $this->miles = $car_miles;
    }

    function setPrice($new_price)
    {
        $float_price = (float) $new_price;
        if ($float_price != 0) {
            $formatted_price = number_format($float_price, 2);
            $this->price = $formatted_price;
        }
    }

    function getPrice()
    {
        return $this->price;
    }
}



//$ferrari->setPrice("480000.3925");   for test purposes






?>
