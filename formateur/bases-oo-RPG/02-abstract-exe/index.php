<?php
// on désactive le transtypage (typage strict).
declare(strict_types=1);

require_once "model/MyPersoAbstract.php";


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Héritage et classes abstraites</title>
</head>
<body>
<h1>Jeux</h1>
<h2>Choisissez votre personnage</h2>
<form action="" method="post" name="perso">
    <fieldset>
        <legend>Nom de votre personnage</legend>
        <input type="text" id="nom" name="nom" placeholder="Nom" required>
        <label for="nom">Commence par une lettre, pas de caractères spéciaux ni d'espace et 4 à 20 caractères</label>
        <hr>
        <legend>Choix de l'espèce</legend>
        <select name="espece_perso" id="espece">
            <option value="">Choix de l'espèce</option>
            <?php
            foreach (MyPersoAbstract::CHOIX_ESPECE as $item):
                ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <label for="espece">Chacun a ses avantages/inconvénients</label>
        <hr>
        <legend>Choix du style</legend>
        <select name="style_perso" id="style">
            <option value="">Choix du style</option>
            <?php
            foreach (MyPersoAbstract::CHOIX_STYLE as $item):
                ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <label for="style">Chacun a ses avantages/inconvénients</label>
        <hr>
        <input type="submit" value="Créer l'utilisateur">
    </fieldset>
</form>
<?php
/*
$perso1 = new MyPerso("Pierre");
$perso2 = new MyPersoMagicien("Mike");


echo MyPerso::DES_DE_DOUZE;*/
?>
<hr>
<h3>Les descendants</h3>
<p>Peuvent intéragir ensemble</p>
<?php
/*
echo $perso1->attaquer($perso2);
echo $perso2->attaquer($perso1);

var_dump($perso1,$perso2);*/
?>
</body>
</html>