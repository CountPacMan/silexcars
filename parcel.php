<?php
class Parcel
{
    private $height;
    private $width;
    private $depth;
    private $weight;


    function getHeight()
    {
        return $this->height;
    }

    function getWidth()
    {
        return $this->width;
    }

    function getDepth()
    {
        return $this->depth;
    }

    function getWeight()
    {
        return $this->weight;
    }

    function __construct($height, $width, $depth, $weight)
    {
        $this->height = $height;
        $this->width = $width;
        $this->depth = $depth;
        $this->weight = $weight;
    }

    function volume(){
        $volume = $this->height * $this->width * $this->depth;
        return $volume;
    }

    function costToShip(){
        $cost = $this->volume() * 0.5;
        return $cost;
    }

}

$parcel = new Parcel($_GET['height'], $_GET['width'], $_GET['depth'], $_GET['weight']);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Find a Cost!</title>
</head>

<body>
    <h1>Your Quote</h1>
    <div class="container">
        <ul>
        <?php
            echo "<li>".$parcel->volume()."</li>";
            echo "<li>".$parcel->costToShip()."</li>";
        ?>
        </ul>
        </div>
</body>


</html>
