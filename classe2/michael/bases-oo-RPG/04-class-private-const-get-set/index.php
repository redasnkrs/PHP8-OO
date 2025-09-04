<?php
include "Personnage.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classe avec getters et setters</title>
</head>
<body>
<h1>Classe avec getters et setters</h1>
<h2>Affichage de la classe</h2>
<?php
$perso1 = new Personnage();
?>
<h3>Constante publique</h3>
<p>Les constantes sont par défaut public (mais on peut les rendre private ou protected) elles sont en MAJUSCULE et en SNAKE_CASE, elles doivent être initialisées avec une valeur par défaut.</p>
<pre><code>// Mauvaise pratique, on part de l'instance
echo $perso1::LA_RACE." ";
// Bonne pratique, on part de la class
echo Personnage::LA_RACE;</code></pre>
<?php
// Mauvaise pratique, on part de l'instance
echo $perso1::LA_RACE."<br>";
// Bonne pratique, on part de la classe
echo Personnage::LA_RACE;
// bonne pratique, mais ne fonctionne pas car privée
//echo Personnage::LE_GENRE;
?>
<?php
var_dump($perso1);
?>

<h2>Propriétées private</h2>
</body>
</html>
