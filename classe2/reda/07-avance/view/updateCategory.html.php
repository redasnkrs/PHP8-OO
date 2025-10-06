<?php
// view/updateCategory.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise à jour de la Catégorie</title>
</head>
<body>
    <h1>Mise à jour de la Catégorie</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?c=admin">Administration des catégories</a>
    </nav>
    <h2>Mise à jour de la catégorie : <?= $category->getCategoryName() ?></h2>
    <?php if (isset($message)): ?>
        <p style="color:red; font-weight: bold;"><?= $message ?></p>
    <?php endif; ?>
    <form action="" method="post" name="name">
        <input type="hidden" name="id" value="<?= $category->getId() ?>">
        <label for="category_name">Nom de la catégorie</label><br>
        <input type="text" name="category_name" id="category_name" value="<?= $category->getCategoryName() ?>" required><br><br>

        <label for="category_desc">Description</label><br>
        <textarea name="category_desc" id="category_desc" cols="30" rows="10"><?= $category->getCategoryDesc() ?></textarea><br><br>

        <input type="submit" value="Mettre à jour la catégorie">

    </form>
</body>
</html>
