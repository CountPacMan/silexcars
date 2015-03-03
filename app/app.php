<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/", function(){
        return " <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find a Car!</h1>
                <form action='results'>
                    <div class='form-group'>
                        <label for='price'>Enter Maximum Price:</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='miles'>Enter Maximum Mileage:</label>
                        <input id='miles' name='miles' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form>
            </div>
        </body>
        </html>
        ";

    });

    $app->get("/results", function() {

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
                if ($car->worthBuying($_GET['price']) && $car->worthMileage($_GET['miles'])) {
                    array_push($cars_matching_search, $car);
                }
            }
        $toReturn = "<!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car!</title>
        </head>

        <body>
            <div class='container'>
                <h1>Your Dealership</h1>
                <form action='results'>
                    <div class='form-group'>
                        <label for='price'>Enter Maximum Price:</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='miles'>Enter Maximum Mileage:</label>
                        <input id='miles' name='miles' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form> ";



        foreach ($cars_matching_search as $car) {
            $car_price = $car->getPrice();
            $toReturn .= "<div class='row'>
                <div class='col-md-6'>
                    <p>";
            $toReturn .= $car->getModel();
            $toReturn .= "</p>
                    </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <img src='";
            $toReturn .= $car->getPhoto();
            $toReturn .= "'>
                    </div>
                    </div>
                <p>$";
            $toReturn .= $car->getPrice();
            $toReturn .= "</p><p>";
            $toReturn .= $car->getMiles();
            $toReturn .= " miles</p>";
        }
        if (empty($cars_matching_search)) {
            $toReturn .= "No vehicles match your search.";
        }

        $toReturn .= "    </div>
        </body>
        </html>
        ";
        return $toReturn;
    });

    $app->get("/view_cars", function() {

    });

    return $app;
?>
