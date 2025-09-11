<?php
// phpinfo();
declare(strict_types=1);
include "LaVoiture.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
    <h1>Constructeur</h1>
    <p>Permettant de passer des arguments lors de </p>
<?php
if (LaVoiture::VOITURE_NEUVE === true) {
    echo "<h2>Votiures neuves</h2>";
}; // accès à une constante publique
// echo LaVoiture::MOTORISATION; // erreur, constante privée

$car1 = new LaVoiture("Mercedes", 2020, 150);
$car2 = new LaVoiture("Volvo", 2015, 120);
var_dump($car1);
?>
</body>
</html>