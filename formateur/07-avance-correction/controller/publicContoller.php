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
            if(isset($_GET['slug']) && !empty($_GET['slug'])){
                // on récupère l'article par son slug
                $article = $ArticleManager->readBySlug($_GET['slug']);
                if($article !== false){
                    // on affiche l'article
                    include RACINE_PATH . "/view/article.html.php";
                }else{
                    // article non trouvé
                    $message = "Article non trouvé";
                    include RACINE_PATH . "/view/404.html.php";
                }
            }else{
                // article non trouvé
                $message = "Article non trouvé";
                include RACINE_PATH . "/view/404.html.php";
            }
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