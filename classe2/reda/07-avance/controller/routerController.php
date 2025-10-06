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
    DB_TYPE .
      ":host=" .
      DB_HOST .
      ";port=" .
      DB_PORT .
      ";dbname=" .
      DB_NAME .
      ";charset=" .
      DB_CHARSET,
    DB_LOGIN,
    DB_PWD,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
  );
} catch (Exception $e) {
  die($e->getMessage());
}

// Instanciation du Manager d'ArticleMapping
$ArticleManager = new ArticleManager($connectPDO);

// Instanciation du Manager de CategoryMapping
$CategoryManager = new CategoryManager($connectPDO);

/*
 * Page d'accueil
 * On souhaite y afficher tous nos articles qui sont visibles
 */
if (isset($_GET["p"]) || isset($_GET["c"])) {
  // pour articles
  if (isset($_GET["p"])) {
    switch ($_GET["p"]) {
      // page admin
      case "admin":
        $nosArticle = $ArticleManager->readAll();
        include RACINE_PATH . "/view/admin.html.php";
        break;
      // create article
      case "create":
        // si le formulaire est envoyé
        if (
          isset(
            $_POST["article_title"],
            $_POST["article_text"],
            $_POST["article_visibility"],
          )
        ) {
          try {
            // utilisation des setters
            $newArticle = new ArticleMapping($_POST);
            // pas de faute création du slug
            // qui est importé par 'use SlugifyTrait'
            // dans ArticleManager, on décode l'htmspecialchars
            // pour éviter des caractères parasites dans le nom
            // du slug
            $slug = $ArticleManager->slugify(
              html_entity_decode($newArticle->getArticleTitle()),
            );
            // on utilise le setter d'Article pour mettre
            // à jour article_slug
            $newArticle->setArticleSlug($slug);

            // on veut insérer l'article
            $ok = $ArticleManager->create($newArticle);
            if ($ok === true) {
              // redirection vers la page d'admin
              header("Location: ./?p=admin");
              exit();
            } else {
              // erreur lors de l'insertion
              $message = $ok;
            }
          } catch (Exception $e) {
            die($e->getMessage());
          }
        }
        include RACINE_PATH . "/view/create.html.php";

        break;
      // update article
      case "update":
        if (!empty($_GET["id"]) && ctype_digit($_GET["id"])):
          // si on a cliqué sur update
          if (
            isset(
              $_POST["article_title"],
              $_POST["article_text"],
              $_POST["article_visibility"],
            )
          ) {
            // les setters revérifient les champs
            $updateArticle = new ArticleMapping($_POST);
            // on régénère le slug depuis lui-même
            $slug = $ArticleManager->slugify(
              html_entity_decode($updateArticle->getArticleTitle()),
            );
            // on utilise le setter d'Article pour mettre
            // à jour article_slug
            $updateArticle->setArticleSlug($slug);
            // on va modifier dans la table article
            try {
              $ok = $ArticleManager->update($_GET["id"], $updateArticle);
              // si une erreur comme l'id ou problème d'insertion
              if (is_string($ok)) {
                $message = $ok;
                include RACINE_PATH . "/view/404.html.php";
                die();
              }
              header("location: ./?p=admin");
            } catch (Exception $e) {
              echo $e->getMessage();
            }
          }
          // récupération de l'article
          $article = $ArticleManager->readById((int) $_GET["id"]);
          // si l'article n'existe pas
          if ($article === false) {
            $message = "Cet article n'existe plus";
            include RACINE_PATH . "/view/404.html.php";
          } else {
            include RACINE_PATH . "/view/update.html.php";
          }
        else:
          $message = "Touche pas à mon code !";
          include RACINE_PATH . "/view/404.html.php";
        endif;
        break;
      // delete article
      case "delete":
        if (!empty($_GET["id"]) && ctype_digit($_GET["id"])):
          $ok = $ArticleManager->delete($_GET["id"]);
          if ($ok) {
            header("Location: ./?p=admin");
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

    // category
  } elseif (isset($_GET["c"])) {
    // pour les category
    switch ($_GET["c"]) {
      // page admin
      case "admin":
        $nosArticle = $ArticleManager->readAll();
        $nosCategory = $CategoryManager->readAll();
        include RACINE_PATH . "/view/admin.html.php";
        break;
      // create category
      case "create":
        if (isset($_POST["category_name"])) {
          try {
            $newCategory = new CategoryMapping($_POST);
            $ok = $CategoryManager->create($newCategory);
            if ($ok) {
              header("Location: ./?c=admin");
              exit();
            } else {
              $message = "Erreur lors de l'insertion";
            }
          } catch (Exception $e) {
            $message = $e->getMessage();
          }
        }
        include RACINE_PATH . "/view/createCategory.html.php";
        break;
      // update category
      case "update":
        if (!empty($_GET["id"]) && ctype_digit($_GET["id"])) {
          $id = (int) $_GET["id"];
          if (isset($_POST["category_name"])) {
            try {
              $updateCategory = new CategoryMapping($_POST);
              $ok = $CategoryManager->update($id, $updateCategory);
              if ($ok) {
                header("Location: ./?c=admin");
                exit();
              } else {
                $message = "Erreur lors de la mise à jour";
              }
            } catch (Exception $e) {
              $message = $e->getMessage();
            }
          }
          $category = $CategoryManager->readById($id);
          if (!$category) {
            $message = "Catégorie non trouvée";
            include RACINE_PATH . "/view/404.html.php";
          } else {
            include RACINE_PATH . "/view/updateCategory.html.php";
          }
        } else {
          $message = "ID de catégorie non valide";
          include RACINE_PATH . "/view/404.html.php";
        }
        break;
      // delete category
      case "delete":
        if (!empty($_GET["id"]) && ctype_digit($_GET["id"])) {
          $id = (int) $_GET["id"];
          $ok = $CategoryManager->delete($id);
          if ($ok) {
            header("Location: ./?c=admin");
            exit();
          } else {
            $message = "Erreur lors de la suppression";
            include RACINE_PATH . "/view/404.html.php";
          }
        } else {
          $message = "ID de catégorie non valide";
          include RACINE_PATH . "/view/404.html.php";
        }
        break;
    }
  }
} else {
  // récupération des articles visibles
  $nosArticle = $ArticleManager->readAllVisible();
  // récupération des catégories
  $nosCategory = [];
  // appel de la vue
  include RACINE_PATH . "/view/homepage.html.php";
}

// fermeture de connexion
$connectPDO = null;
