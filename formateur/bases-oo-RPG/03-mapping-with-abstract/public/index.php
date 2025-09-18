<?php


require_once "../config.php";

// utilisation de la racine pour construire nos include, require etc.
require_once RACINE_PATH."/model/AbstractMapping.php";
require_once RACINE_PATH."/model/ArticleMapping.php";

echo "<p>Les constantes magiques : <a href='https://www.php.net/manual/en/language.constants.magic.php' target='_blank'>constantes magiques</a> </p>";
echo "<p>RACINE_PATH chemin fixe vers la racine de notre site : ".RACINE_PATH."</p>";
echo "<hr><p>Utilisation provisoire d'une méthode statique (echo AbstractMapping::slugify(".'$titre'.");)</p>";
$titre = "Un titre l'école et l'hôpital";
echo AbstractMapping::slugify($titre);
?>
<hr><h3>Mapping de la table article</h3>
<p>On va instancier la classe ArticleMapping.php</p>
<?php
$article1 = new ArticleMapping(null,"Un titre",'2022-01-01 13:00:00');
$article2 = new ArticleMapping(7,"Un deuxième titre",'2022-01-01 13:00:00');
try {
    $article3 = new ArticleMapping(null, "5",'2022-01-01 13:00:00');
}catch(Exception $e){
    echo $e->getMessage().' $article3 n\'est pas créé !';
}

var_dump($article1,$article2);
