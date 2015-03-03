<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $photo;

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

    function getMiles() {
        return $this->miles;
    }

    function getModel() {
        return $this->make_model;
    }

    function getPhoto() {
        return $this->photo;
    }
}

$ferrari = new Car('2012 Ferrari 480', 'images/ferrari.jpeg', 840000, 40000);

$porsche = new Car('2014 Porsche 911', 'images/porsche.jpg', 114991, 7864);

$ford = new Car('2011 Ford F450', 'images/ford.jpg', 55995, 14241);

$lexus = new Car('2013 Lexus RX 350', 'images/lexus.jpg', 44700, 20000);

$mercedes = new Car('Mercedes Formula One Car', 'images/formulaone.jpg', 1200000, 37979);

$mercury = new Car('2000 Mercury Sable', 'images/mercury.jpg', 3999, 100000);

$subaru = new Car('2009 Subaru Outback Sport', 'images/subaru.jpg', 16999, 59600);

$vw = new Car('2012 Volkswagen GTI', 'images/vw.jpg', 26999, 21500);



$cars = array($ferrari, $porsche, $ford, $lexus, $mercedes, $mercury, $subaru, $vw);
    $cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($carPrice) && $car->worthMileage($carMiles)) {
            array_push($cars_matching_search, $car);
        }
    }

//$ferrari->setPrice("480000.3925");   for test purposes






?>
