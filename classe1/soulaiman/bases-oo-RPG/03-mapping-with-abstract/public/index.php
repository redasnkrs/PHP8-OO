<?php
 
require_once "../config.php";
 
// utilisation de la racine pour construire nos include, require etc.
require_once RACINE_PATH."/model/AbstractMapping.php";
require_once RACINE_PATH."/model/ArticleMapping.php";
 
 
//echo "<p>Les constantes magiques : <a href='https://www.php.net/manual/en/language.constants.magic.php' target='_blank'>constantes magiques</a> </p>";
//echo "<p>RACINE_PATH chemin fixe vers la racine de notre site : ".RACINE_PATH."</p>";
//echo "<hr><p>Utilisation provisoire d'une méthode statique (echo AbstractMapping::slugify(".'$titre'.");)</p>";
//$titre = "Un titre l'école et l'hôpital";
//echo AbstractMapping::slugify($titre);
 
 
$article1 = new ArticleMapping(
    1,
    "Mon premier article",
    "mon-premier-article",
    "Ceci est le texte de mon premier article. ",
    "2024-06-10",
    1
);
$article2 = new ArticleMapping(
    2,
    "Mon deuxième article",
    "mon-deuxieme-article",
    "Ceci est le texte de mon deuxième article. ",
    "2024-06-11",
    0
); 
$article3 = new ArticleMapping(
    3,
    "Mon troisième article",
    "mon-troisieme-article",
    "Ceci est le texte de mon troisième article. ",
    "2024-06-12",
    true
); 
echo "<hr><h2>Affichage des articles</h2>";
for ($i=1; $i <=3 ; $i++) { 
    $article = "article".$i;
    echo
    "<h3>Article $i</h3>
    <p>Id : ".$$article->getId()."</p>
    <p>Titre : ".$$article->getArticleTitle()."</p>
    <p>Slug : ".$$article->getArticleSlug()."</p>
    <p>Texte : ".$$article->getArticleText()."</p>
    <p>Date : ".$$article->getArticleDate()."</p>
    <p>Visibilité : ".($$article->getArticleVisibility() ? "Visible" : "Non visible")."</p>
    ";
}

