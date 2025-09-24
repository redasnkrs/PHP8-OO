<?php
declare(strict_types=1);

require_once "../config.php";

// chargement des dépendances dans l'ordre généalogique
// parcequ'il n'y a pas encore d'autoload
include RACINE_PATH."/model/SlugifyTrait.php";
include RACINE_PATH."/model/AbstractMapping.php";// doit être chargé avant ArticleMapping (sinon erreur d'extends)
include RACINE_PATH."/model/ArticleMapping.php";

// chargement du router
require_once RACINE_PATH."/controller/routerController.php";

