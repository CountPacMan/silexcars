<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    session_start();
    if (empty($_SESSION['cars'])) {
        $_SESSION['cars'] = [];
        require_once __DIR__."/../src/car_library.php";
    }

    $app = new Silex\Application();
    // Registerung twig in Silex
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    // Twig will interpret search.php.
    $app->get("/", function() use ($app) {
        return $app['twig']->render('search.twig');

    });

    //Twig will interpret result.php
    $app->get("/results", function() use ($app) {
        $carPrice = $_GET['price'];
        $carMiles = $_GET['miles'];
        $cars_matching_search = [];
        foreach ($_SESSION['cars'] as $car) {
            if ($car->worthBuying($carPrice) && $car->worthMileage($carMiles)) {
                array_push($cars_matching_search, $car);
            }
        }
        // the array from cars_matching search is passed as an associative array called 'cars'
        return $app['twig']->render('result.twig', array('cars' => $cars_matching_search));
    });

    $app->get("/carInput", function() use ($app) {
        return $app['twig']->render('carInput.twig');
    });
    //saving new car along with the saved cars
    $app->post("/carInputed", function() use ($app) {
        $carMake = $_POST['make'];
        $carImage = $_POST['image'];
        $carPrice = $_POST['price'];
        $carMiles = $_POST['miles'];
        $newCar = new Car($carMake, $carImage, $carPrice, $carMiles);
        $newCar->save();

        return $app['twig']->render('carInputed.twig', array('car' => $newCar));
    });

    return $app;
?>
