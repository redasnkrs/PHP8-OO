<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Classe avec getters et setters</title>
</head>
<body style="background-color: whitesmoke">
<?php
include "Personnage.php";
?>
<h1>Classe avec getters et setters</h1>
<h2>Affichage de la classe</h2>
<?php
// création d'une instance de type Personnage
$perso1 = new Personnage();
?>
<h3>Constante publique</h3>
<p>Les constantes sont par défaut public (mais on peut les
rendre private ou protected) elles sont en MAJUSCULES et
en SNAKE_CASE, elle doivent être initialisées avec une valeur
par défaut.</p>
<pre style="background-color: #1a1e21; color: #20c997"><code>
// Mauvaise pratique, on part de l'instance
echo $perso1::LA_RACE . " ";

// Bonne pratique, on part de la classe
echo Personnage::LA_RACE . "<br> ";

  </code> </pre>

<?php
// Mauvaise pratique, on part de l'instance
echo $perso1::LA_RACE . " ";

// Bonne pratique, on part de la classe
echo Personnage::LA_RACE . "<br> ";
// la bonne pratique mais ne fonctionne pas car privée
// echo Personnage::LE_GENRE . "<br> ";

?>


<?php
var_dump( $perso1 );
?>


<h2>Propriété private</h2>
</body>
</html>
