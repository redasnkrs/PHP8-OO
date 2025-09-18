<?php

require_once "../config.php";
require_once RACINE_PATH . "/model/AbstractMapping.php";
require_once RACINE_PATH . "/model/ArticleMapping.php";

echo RACINE_PATH;
echo "<hr>";
$titre = "Un titre l'école et l'hôpital";

echo AbstractMapping::slugify($titre);
?>
<hr><h3>Mapping de la table article<h3>
