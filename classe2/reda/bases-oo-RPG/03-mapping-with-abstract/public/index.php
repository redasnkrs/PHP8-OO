<?php

require_once "../config.php";
require_once RACINE_PATH . "/model/AbstractMapping.php";
require_once RACINE_PATH . "/model/ArticleMapping.php";

echo RACINE_PATH;
echo "<hr>";
$titre = "Un titre l'école et l'hôpital";

echo AbstractMapping::slugify($titre);
$perso1 = new ArticleMapping(
  1,
  "Salutaaa",
  "ceci est un texte",
  "aaaatitle",
  "02-02-2025",
);
var_dump($perso1);
?>
<hr><h3>Mapping de la table article<h3>
