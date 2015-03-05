<?php
    require_once __DIR__."/../vendor/autoload.php";

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
        require_once __DIR__."/../src/car.php";
        // the array from cars_matching search is passed as an associative array called 'cars'
        return $app['twig']->render('result.twig', array('cars' => $cars_matching_search));
    });

    return $app;
?>
