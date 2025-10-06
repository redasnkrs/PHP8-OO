<?php
// view/homepage.html.php
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
            <div class="container">
                <a class="navbar-brand" href="./">
                    <i class="bi bi-gear"></i> Administration
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./">
                                <i class="bi bi-house"></i> Accueil
                            </a>
                        </li>
                        <?php if (isset($_GET['c'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="./?c=admin">
                                    <i class="bi bi-tags"></i> Administration Catégories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?c=createCateg">
                                    <i class="bi bi-plus-circle"></i> Créer une catégorie
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="./?p=admin">
                                    <i class="bi bi-file-text"></i> Administration Articles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?p=create">
                                    <i class="bi bi-plus-circle"></i> Créer un article
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 text-center mb-5">
                        <i class="bi bi-gear"></i> Administration
                    </h1>
                    <?php
                    if (isset($_GET['p'])):
                    ?>
                        <!-- Section Articles -->
                        <div class="row mb-5">
                            <div class="col-12">
                                <h2 class="h3 mb-4">
                                    <i class="bi bi-file-text"></i> Articles de notre site
                                </h2>
                                <?php
                                if (empty($nosArticle)):
                                ?>
                                    <div class="alert alert-info" role="alert">
                                        <i class="bi bi-info-circle"></i> Pas encore d'articles sur notre site
                                    </div>
                                <?php
                                else:
                                    $nbArticle = count($nosArticle);
                                    $pluriel = $nbArticle > 1 ? "s" : "";
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        <i class="bi bi-check-circle"></i> Il y a <?= $nbArticle ?> article<?= $pluriel ?>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th><i class="bi bi-hash"></i> ID</th>
                                                    <th><i class="bi bi-file-text"></i> Titre</th>
                                                    <th><i class="bi bi-link"></i> Slug</th>
                                                    <th><i class="bi bi-text-paragraph"></i> Texte</th>
                                                    <th><i class="bi bi-calendar"></i> Date</th>
                                                    <th><i class="bi bi-eye"></i> Visibilité</th>
                                                    <th><i class="bi bi-pencil"></i> Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nosArticle as $item): ?>
                                                    <tr>
                                                        <td><span class="badge bg-secondary"><?= $item->getId() ?></span></td>
                                                        <td><?= html_entity_decode($item->getArticleTitle()) ?></td>
                                                        <td><code><?= $item->getArticleSlug() ?></code></td>
                                                        <td><?= html_entity_decode(substr($item->getArticleText(), 0, 150)) ?>...</td>
                                                        <td><?= $item->getArticleDate() ?></td>
                                                        <td>
                                                            <?php if ($item->getArticleVisibility()): ?>
                                                                <span class="badge bg-success">Visible</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-danger">Masqué</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <a href="?p=update&id=<?= $item->getId() ?>" class="btn btn-warning btn-sm">
                                                                    <i class="bi bi-pencil"></i> Modifier
                                                                </a>
                                                                <a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer l\'article <?= $item->getArticleSlug() ?>'); if(a){ document.location ='?p=delete&id=<?= $item->getId() ?>';}" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash"></i> Supprimer
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>

                    <?php
                    if (isset($_GET['c'])):
                    ?>
                        <!-- Section Catégories -->
                        <div class="row mb-5">
                            <div class="col-12">
                                <h2 class="h3 mb-4">
                                    <i class="bi bi-tags"></i> Catégories de notre site
                                </h2>
                                <?php
                                if (empty($nosCategory)):
                                ?>
                                    <div class="alert alert-info" role="alert">
                                        <i class="bi bi-info-circle"></i> Pas encore de catégories sur notre site
                                    </div>
                                <?php
                                else:
                                    $nbCategory = count($nosCategory);
                                    $pluriel = $nbCategory > 1 ? "s" : "";
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        <i class="bi bi-check-circle"></i> Il y a <?= $nbCategory ?> catégorie<?= $pluriel ?>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th><i class="bi bi-hash"></i> ID</th>
                                                    <th><i class="bi bi-tag"></i> Nom</th>
                                                    <th><i class="bi bi-link"></i> Slug</th>
                                                    <th><i class="bi bi-text-paragraph"></i> Description</th>
                                                    <th><i class="bi bi-pencil"></i> Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nosCategory as $cat): ?>
                                                    <tr>
                                                        <td><span class="badge bg-secondary"><?= $cat->getId() ?></span></td>
                                                        <td><?= html_entity_decode($cat->getCategoryName()) ?></td>
                                                        <td><code><?= $cat->getCategorySlug() ?></code></td>
                                                        <td><?= html_entity_decode(substr($cat->getCategoryDesc(), 0, 150)) ?>...</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <a href="?c=updateCateg&id=<?= $cat->getId() ?>" class="btn btn-warning btn-sm">
                                                                    <i class="bi bi-pencil"></i> Modifier
                                                                </a>
                                                                <a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer la catégorie <?= $cat->getCategorySlug() ?>'); if(a){ document.location ='?c=deleteCateg&id=<?= $cat->getId() ?>';}" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash"></i> Supprimer
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>