<?php
// path: formateur/07-avance-correction/controller/publicContoller.php
/*
 *
 * Contrôleur public
 *
 */
/*
    *
    * Partie publique du site
    *
    */
// page d'accueil
if (!isset($_GET['p'])) {

    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // récupération des catégories
    $nosCategory = [];
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";

    // autres pages
}else{
    // si on a un paramètre p
    switch ($_GET['p']) {
        // pour les articles
        case 'article':
            // appel du controller des articles
            require_once RACINE_PATH . "/controller/articleController.php";
            break;
        // pour les catégories
        case 'category':
            // appel du controller des catégories
            require_once RACINE_PATH . "/controller/categoryController.php";
            break;
        // page non trouvée
        default:
            include RACINE_PATH . "/view/404.html.php";
            break;
    }
}