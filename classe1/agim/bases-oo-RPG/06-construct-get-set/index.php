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

    <br><br>
    <form action="" method="post">
        <input type="text" name="name" id="name">
        <select name="selectRace" id="selectRace">
            <option value="rien">dazdazdaz</option>
            <?php
            foreach (NotrePerso::CHOIX_ESPECE as $item) :
            ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <input type="submit" value="creer">
    </form>

    <?php
    try {
        $perso1 = new NotrePerso(null, "<script>Pierre", "Nain");
        if ($_POST['name'] && $_POST['selectRace']) {
            $name = $_POST['name'];
            $race = $_POST['selectRace'];
            $perso = new NotrePerso(null, $name, $race);
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
    echo "<p>{$perso1->getId()}</p><p>{$perso1->getName()}</p>";
    echo "<p>{$perso->getId()}</p><p>{$perso->getName()}</p><p>{$perso->getEspecePerso()}</p>";

    /*
echo $perso1->getId();
$perso1->setId(65);
echo $perso1->getId();
echo "<hr>{$perso1->getName()}";
$perso1->setName(" <script> alert('jghjg'); </script>    ");
echo "<hr>{$perso1->getName()}";
*/
    echo "<pre>";
    var_dump($perso1, $perso);
    // var_dump($_POST);
    echo "</pre>";


    ?>

</body>

</html>