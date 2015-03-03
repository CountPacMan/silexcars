<?php
    require_once __DIR__."/../vendor/autoload.php";

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
        $carPrice = $_GET['price'];
        $carMiles = $_GET['miles'];
        require_once __DIR__."/../src/car.php";
        
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
