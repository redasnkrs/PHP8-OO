<?php
// on désactive le transtypage (typage strict).
declare(strict_types=1);

require_once "model/MyPersoAbstract.php";
require_once "model/HumainPerso.php";
require_once "model/HumainVoleur.php";
require_once "model/HumainGuerrier.php";
require_once "model/HumainMagicienBlanc.php";
require_once "model/ElfePerso.php";
require_once "model/ElfeGuerrier.php";
require_once "model/ElfeVoleur.php";
require_once "model/ElfeMagicienBlanc.php";
require_once "model/OrcPerso.php";
require_once "model/OrcMagicienBlanc.php";
require_once "model/OrcGuerrier.php";
require_once "model/OrcVoleur.php";



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
<h1>Jeux - Exercices</h1>
<p>Créez les classes suivantes :</p>
<ul>
    <li>MyPersoAbstract</li>
    <li>OrcPerso</li>
    <li>OrcMagicienBlanc</li>
    <li>ElfeGuerrier</li>
    <li>HumainGuerrier</li>
    <li>OrcGuerrier</li>
    <li>ElfeVoleur</li>
    <li>HumainVoleur</li>
    <li>OrcVoleur</li>
</ul>
<h2>Permettre de faire des combats entre deux personnages</h2>
<p>Ces combats devront avoir une fin (quand la vie arrive à 0)</p>
<p>Le combat durera tant qu'un des deux personnages n'est pas mort</p>
<h2>Choisissez votre personnage</h2>


<form action="" method="post" name="perso">
    <fieldset>
        <legend>Joueur 1</legend>
        <input type="text" name="nom1" placeholder="Nom Joueur 1" required>
        <select name="espece1" required>
            <option value="">Espèce</option>
            <?php foreach (MyPersoAbstract::CHOIX_ESPECE as $item): ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>
        <select name="style1" required>
            <option value="">Style</option>
            <?php foreach (MyPersoAbstract::CHOIX_STYLE as $item): ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>
        <hr>
        <legend>Joueur 2</legend>
        <input type="text" name="nom2" placeholder="Nom Joueur 2" required>
        <select name="espece2" required>
            <option value="">Espèce</option>
            <?php foreach (MyPersoAbstract::CHOIX_ESPECE as $item): ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>
        <select name="style2" required>
            <option value="">Style</option>
            <?php foreach (MyPersoAbstract::CHOIX_STYLE as $item): ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>
        <hr>
        <input type="submit" value="Créer les deux joueurs">
    </fieldset>
</form>

<?php


if (
    isset($_POST['nom1'], $_POST['espece1'], $_POST['style1']) &&
    isset($_POST['nom2'], $_POST['espece2'], $_POST['style2'])
) {
    // Joueur 1
    $nom1 = $_POST['nom1'];
    $espece1 = $_POST['espece1'];   
    $style1 = $_POST['style1'];
    $joueur1 = null;

    if ($espece1 === "Humain" && $style1 === "Guerrier") {
        $joueur1 = new HumainGuerrier($nom1, $espece1, $style1);
    } elseif ($espece1 === "Humain" && $style1 === "Magicien") {
        $joueur1 = new HumainMagicienBlanc($nom1, $espece1, $style1);
    } elseif ($espece1 === "Humain" && $style1 === "Voleur") {
        $joueur1 = new HumainVoleur($nom1, $espece1, $style1);
    } elseif ($espece1 === "Elfe" && $style1 === "Guerrier") {
        $joueur1 = new ElfeGuerrier($nom1, $espece1, $style1);
    } elseif ($espece1 === "Elfe" && $style1 === "Magicien") {
        $joueur1 = new ElfeMagicienBlanc($nom1, $espece1, $style1);
    } elseif ($espece1 === "Elfe" && $style1 === "Voleur") {
        $joueur1 = new ElfeVoleur($nom1, $espece1, $style1);
    } elseif ($espece1 === "Orc" && $style1 === "Guerrier") {
        $joueur1 = new OrcGuerrier($nom1, $espece1, $style1);
    } elseif ($espece1 === "Orc" && $style1 === "Magicien") {
        $joueur1 = new OrcMagicienBlanc($nom1, $espece1, $style1);
    } elseif ($espece1 === "Orc" && $style1 === "Voleur") {
        $joueur1 = new OrcVoleur($nom1, $espece1, $style1);
    }

    // Joueur 2
    $nom2 = $_POST['nom2'];
    $espece2 = $_POST['espece2'];
    $style2 = $_POST['style2'];
    $joueur2 = null;

    if ($espece2 === "Humain" && $style2 === "Guerrier") {
        $joueur2 = new HumainGuerrier($nom2, $espece2, $style2);
    } elseif ($espece2 === "Humain" && $style2 === "Magicien") {
        $joueur2 = new HumainMagicienBlanc($nom2, $espece2, $style2);
    } elseif ($espece2 === "Humain" && $style2 === "Voleur") {
        $joueur2 = new HumainVoleur($nom2, $espece2, $style2);
    } elseif ($espece2 === "Elfe" && $style2 === "Guerrier") {
        $joueur2 = new ElfeGuerrier($nom2, $espece2, $style2);
    } elseif ($espece2 === "Elfe" && $style2 === "Magicien") {
        $joueur2 = new ElfeMagicienBlanc($nom2, $espece2, $style2);
    } elseif ($espece2 === "Elfe" && $style2 === "Voleur") {
        $joueur2 = new ElfeVoleur($nom2, $espece2, $style2);
    } elseif ($espece2 === "Orc" && $style2 === "Guerrier") {
        $joueur2 = new OrcGuerrier($nom2, $espece2, $style2);
    } elseif ($espece2 === "Orc" && $style2 === "Magicien") {
        $joueur2 = new OrcMagicienBlanc($nom2, $espece2, $style2);
    } elseif ($espece2 === "Orc" && $style2 === "Voleur") {
        $joueur2 = new OrcVoleur($nom2, $espece2, $style2);
    }

    // Affichage des deux joueurs
    if ($joueur1 && $joueur2) {
        echo "<h2>Joueur 1</h2>";
        echo "<ul>";
        echo "<li>Nom : " . $joueur1->getName() . "</li>";
        echo "<li>Espèce : " . $joueur1->getEspecePerso() . "</li>";
        echo "<li>Style : " . $joueur1->getStylePerso() . "</li>";
        echo "<li>Vie : " . $joueur1->getVie() . "</li>";
        echo "<li>Agilité : " . $joueur1->getAgilite() . "</li>";
        if (method_exists($joueur1, 'getMagie')) {
            echo "<li>Magie : " . $joueur1->getMagie() . "</li>";
        }
        echo "<li>Blesse : " . $joueur1->getBlesse() . "</li>";
        echo "<li>XP : " . $joueur1->getXp() . "</li>";
        echo "</ul>";

        echo "<h2>Joueur 2</h2>";
        echo "<ul>";
        echo "<li>Nom : " . $joueur2->getName() . "</li>";
        echo "<li>Espèce : " . $joueur2->getEspecePerso() . "</li>";
        echo "<li>Style : " . $joueur2->getStylePerso() . "</li>";
        echo "<li>Vie : " . $joueur2->getVie() . "</li>";
        echo "<li>Agilité : " . $joueur2->getAgilite() . "</li>";
        if (method_exists($joueur2, 'getMagie')) {
            echo "<li>Magie : " . $joueur2->getMagie() . "</li>";
        }
        echo "<li>Blesse : " . $joueur2->getBlesse() . "</li>";
        echo "<li>XP : " . $joueur2->getXp() . "</li>";
        echo "</ul>";
    }
}


echo "{$joueur1->attaquer($joueur2)}";

//var_dump($perso1,$perso2,$_POST,$perso3);
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