<?php
// Déxlaration du mode strict
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "LaVoiture.php";
?>

<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constructeur</title>
</head>
<body>
<h1>Constructeur</h1>
<p>La méthode public __construct() est la méthode magique permettant de passer des arguments lors de l'instanciation d'une classe.</p>
<pre>
    <?php
    if(LaVoiture::VOITURE_NEUVE === true){
        echo "<h2>Voitures neuves</h2>";
    }
    $car1 = new LaVoiture("Mercedes", 2024, 333, "EQS");
    $car2 = new LaVoiture("Volvo", 2015, 428, "EX30");

    // Constante privée
    // echo LaVoiture::MOTORISATION;
    var_dump($car1, $car2);
    ?>
</pre>
</body>
</html>
