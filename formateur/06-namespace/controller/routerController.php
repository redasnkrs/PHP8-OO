<?php
// echo __FILE__; // chemin et nom de fichier

// chemin vers la classe Manager d'Article
use model\ArticleManager;
// chemin vers le mapping d'Article
use model\ArticleMapping;

# Connexion PDO
try {
    $connectPDO = new PDO(
        DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        ]
    );
}catch(Exception $e){
    die($e->getMessage());
}

// Instanciation du Manager d'ArticleMapping
$ArticleManager = new ArticleManager($connectPDO);

/*
 * Page d'accueil
 * On souhaite y afficher tous nos articles qui sont visibles
 */
if(isset($_GET['p'])){

    switch($_GET['p']){
        case 'admin':
            $nosArticle = $ArticleManager->readAll();
            include RACINE_PATH . "/view/admin.html.php";
            break;
        case 'create':
            // si le formulaire est envoyé
            if(isset($_POST['article_title'],$_POST['article_text'],$_POST['article_visibility'])){
                try {
                    // utilisation des setters
                    $newArticle = new ArticleMapping($_POST);
                    // pas de faute création du slug
                    // qui est importé par 'use SlugifyTrait'
                    // dans ArticleManager, on décode l'htmspecialchars
                    // pour éviter des caractères parasites dans le nom
                    // du slug
                    $slug = $ArticleManager->slugify(html_entity_decode($newArticle->getArticleTitle()));
                    // on utilise le setter d'Article pour mettre
                    // à jour article_slug
                    $newArticle->setArticleSlug($slug);

                    // on veut insérer l'article
                    $ok = $ArticleManager->create($newArticle);
                    if($ok === true){
                        // redirection vers la page d'admin
                        header("Location: ./?p=admin");
                        exit;
                    }else{
                        // erreur lors de l'insertion
                        $message = $ok;
                    }

                }catch (Exception $e){
                    die($e->getMessage());
                }
            }
                include RACINE_PATH . "/view/create.html.php";

            break;
        case 'update':
                if(!empty($_GET['id'])  && ctype_digit($_GET['id'])):
                    // récupération de l'article
                    $article = $ArticleManager->readById((int)$_GET['id']);
                    include RACINE_PATH."/view/update.html.php";
                else:
                    $message = "Touche pas à mon code !";
                    include RACINE_PATH."/view/404.html.php";
                endif;
            break;
        case 'delete':
            if(!empty($_GET['id'])  && ctype_digit($_GET['id'])):

            else:
                $message = "Touche pas à mon code !";
                include RACINE_PATH."/view/404.html.php";
            endif;
            break;
    }

}else {
    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";
}

// fermeture de connexion
$connectPDO = null;