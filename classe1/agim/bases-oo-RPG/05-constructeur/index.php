<?php
declare(strict_types=1);
include "Perso.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Le constructeur</title>
</head>
<body>
<h1>Le constructeur</h1>
<p>Le constructeur est une méthode publique magique, elle est appelée lorsqu'on instancie une classe (new)</p>
<?php
$perso1 = new Perso("Michaël","Magicien");
$perso2 = new Perso("Pierre","Humain");
echo "<hr>";
echo 'Perso::BEGIN_HEALTH => '.Perso::BEGIN_HEALTH."<br>";
echo "<hr>";
echo 'Mauvaise pratique, depuis l\'instance : $perso1::BEGIN_HEALTH => '.$perso1::BEGIN_HEALTH."<br>";
// Ne fonctionnera pas :
//echo 'Perso::RACE => '.Perso::RACE."<br>";
// fonctionne car readonly
echo '<h4>readonly</h4>';
echo "On peut le lire depuis l'extérieur, mais pas le modifier :<br>";
echo $perso1->spec;
echo '<br> ne fonctionne pas (attribution) $perso1->spec=25<br> N\'est pas encore une bonne pratique, à garder en mémoire pour l\'avenir';
var_dump($perso1,$perso2);


?>
</body>
</html>
