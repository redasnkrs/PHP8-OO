<?php

declare(strict_types=1);
include "NotrePerso.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'un personnage</title>
</head>

<body>
    <h1>Création d'un personnage</h1>
    <p>Nous allons créer une instance de NotrePerso()</p>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Votre nom"/><br>
        <select name="espece" id="">
            <option value="rien">Choisir un type</option>
            <?php
            foreach (NotrePerso::CHOIX_ESPECE as $item) {
            ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" value="créer le personnage" />
    </form>
    <?php
    var_dump($_POST);
    try {
        $perso1 = new NotrePerso(null, $_POST['name'], $_POST['espece']);
    } catch (Exception $e) {
        die($e->getMessage());
    }

    echo "<p>{$perso1->getId()}</p><p>{$perso1->getName()}</p><p>{$perso1->getEspecePerso()}</p>";

    /*
echo $perso1->getId();
$perso1->setId(65);
echo $perso1->getId();
echo "<hr>{$perso1->getName()}";
$perso1->setName(" <script> alert('jghjg'); </script>    ");
echo "<hr>{$perso1->getName()}";
*/
    var_dump($perso1);

    ?>
</body>

</html>