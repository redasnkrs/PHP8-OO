
<?php
// echo __FILE__; // chemin et nom de fichier

// chemin vers la classe Manager d'Article
use model\ArticleManager;
// chemin vers le mapping d'Article
use model\ArticleMapping;
// ici pour Category
use model\CategoryManager;
use model\CategoryMapping;

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
$CategoryManager = new CategoryManager($connectPDO);
if(isset($_GET['c'])){ 

        // pour les category
        switch ($_GET['c']) {
            // page admin
          case 'admin':
    try {
        $nosCategory = $CategoryManager->readAll();
    } catch (Exception $e) {
        $message = "Erreur catégorie : " . $e->getMessage();
        include RACINE_PATH . "/view/404.html.php";
        exit;
    }
    include RACINE_PATH . "/view/admin.category.html.php";
    break;
            // create category
            case 'createCateg':

               if (isset($_POST['category_name'],  $_POST['category_desc'])) {
                    try {
                        // utilisation des setters
                        $newCategory = new CategoryMapping($_POST);
                        // pas de faute création du slug
                        // qui est importé par 'use SlugifyTrait'
                        // dans ArticleManager, on décode l'htmspecialchars
                        // pour éviter des caractères parasites dans le nom
                        // du slug
                        $slug = $CategoryManager->slugify(html_entity_decode($newCategory->getCategoryName()));
                        // on utilise le setter d'Article pour mettre
                        // à jour article_slug
                        $newCategory->setCategorySlug($slug);

                        // on veut insérer l'article
                        $ok = $CategoryManager->create($newCategory);
                        var_dump($ok);
                        if ($ok === true) {
                            // redirection vers la page d'admin
                            header("Location: ./?c=admin");
                            exit;
                        } else {
                            // erreur lors de l'insertion
                            $message = $ok;
                        }

                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                }
                include RACINE_PATH . "/view/create.category.html.php";

                break;
            // update category
            case 'updateCateg':
            if (!empty($_GET['id']) && ctype_digit($_GET['id'])):
                    // si on a cliqué sur update
                    if (isset($_POST['category_name'], $_POST['category_desc'])) {

                        // les setters revérifient les champs
                        $updateCategory = new CategoryMapping($_POST);
                        // on régénère le slug depuis lui-même
                        $slug = $CategoryManager->slugify(html_entity_decode($updateCategory->getCategoryName()));
                        // on utilise le setter d'Article pour mettre
                        // à jour article_slug
                        $updateCategory->setCategorySlug($slug);
                        // on va modifier dans la table article
                        try {
                            $ok = $CategoryManager->update($_GET['id'], $updateCategory);
                            // si une erreur comme l'id ou problème d'insertion
                            if (is_string($ok)) {
                                $message = $ok;
                                include RACINE_PATH . "/view/404.html.php";
                                die();
                            }
                            header("location: ./?c=admin");
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }


                    }
                    // récupération de l'article
                    $category = $CategoryManager->readById((int)$_GET['id']);
                    // si l'article n'existe pas
                    if ($category === false) {
                        $message = "Cet article n'existe plus";
                        include RACINE_PATH . "/view/404.html.php";
                    } else {
                        include RACINE_PATH . "/view/update.category.html.php";
                    }
                else:
                    $message = "Touche pas à mon code !";
                    include RACINE_PATH . "/view/404.html.php";
                endif;
                break;
                break;

            // delete article
            case 'deleteCateg':

                if (!empty($_GET['id']) && ctype_digit($_GET['id'])):
                    $ok = $CategoryManager->delete($_GET['id']);
                    if ($ok) {
                        header("Location: ./?c=admin");
                    } else {
                        $message = "Erreur lors de la suppression !";
                        include RACINE_PATH . "/view/404.html.php";
                    }
                else:
                    $message = "Touche pas à mon code !";
                    include RACINE_PATH . "/view/404.html.php";
                endif;
                break;
        }
    }else {
    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // récupération des catégories
    $nosCategory = $CategoryManager->readAll();
    
}

// fermeture de connexion
$connectPDO = null;

