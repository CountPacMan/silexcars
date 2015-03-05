<?php

$ferrari = new Car('2012 Ferrari 480', 'images/ferrari.jpeg', 840000, 40000);
$porsche = new Car('2014 Porsche 911', 'images/porsche.jpg', 114991, 7864);
$ford = new Car('2011 Ford F450', 'images/ford.jpg', 55995, 14241);
$lexus = new Car('2013 Lexus RX 350', 'images/lexus.jpg', 44700, 20000);
$mercedes = new Car('Mercedes Formula One Car', 'images/formulaone.jpg', 1200000, 37979);
$mercury = new Car('2000 Mercury Sable', 'images/mercury.jpg', 3999, 100000);
$subaru = new Car('2009 Subaru Outback Sport', 'images/subaru.jpg', 16999, 59600);
$vw = new Car('2012 Volkswagen GTI', 'images/vw.jpg', 26999, 21500);
//saving instances as session variables
$ferrari->save();
$porsche->save();
$ford->save();
$lexus->save();
$mercedes->save();
$mercury->save();
$subaru->save();
$vw->save();
?>
