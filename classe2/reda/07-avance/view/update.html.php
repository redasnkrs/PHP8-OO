<?php
// view/update.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise à jour de l'article </title>
</head>
<body>
    <h1>Mise à jour de l'article </h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a> | <a href="?p=create">Création d'un nouvel article</a>
    </nav>
    <h2>Articles de notre site</h2>
<form action="" method="post" name="name">
    <input type="hidden" name="id" value="<?= $article->getId() ?>">
        <label for="article_title">Titre de l'article</label><br>
        <input type="text" name="article_title" id="article_title" value="<?= html_entity_decode($article->getArticleTitle()) ?>" required><br><br>

        <label for="article_text">Texte de l'article</label><br>
        <textarea name="article_text" id="article_text" cols="30" rows="10" required><?= html_entity_decode($article->getArticleText()) ?></textarea><br><br>
        <label for="article_date">Date de l'article</label><br>
        <input type="datetime-local" name="article_date" id="article_date" value="<?= $article->getArticleDate() ?>" required><br><br>

        <label for="article_visibility">Visibilité de l'article</label><br>
        <select name="article_visibility" id="article_visibility" required>
            <option value="1" <?= $article->getArticleVisibility() ? 'selected' : '' ?>>Visible</option>
            <option value="0" <?= !$article->getArticleVisibility() ? 'selected' : '' ?>>Non visible</option>
        </select><br><br>

        <input type="submit" value="Mettre à jour l'article">

    </form>
<?php var_dump($_POST);
// si on a soumis le formulaire
if(isset($article)) var_dump($article);
if(isset($updateArticle)) var_dump($updateArticle);
?>

</body>
</html>
