<?php
// path: formateur/07-avance-correction/controller/publicContoller.php
/*
 *
 * Contrôleur public
 *
 */

// page d'accueil
if (!isset($_GET['p'])) {

    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // récupération des catégories
    $nosCategory = $CategoryManager->readAll();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";

    // autres pages
}else{
    // si on a un paramètre p
    switch ($_GET['p']) {
        // pour les articles
        case 'article':

            break;
        // pour les catégories
        case 'category':

            break;
        // page non trouvée
        default:
            include RACINE_PATH . "/view/404.html.php";
            break;
    }
}