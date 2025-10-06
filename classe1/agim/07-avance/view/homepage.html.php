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
    <title>Page d'accueil</title>
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
                    <i class="bi bi-house-door"></i> Mon Site
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="./">
                                <i class="bi bi-house"></i> Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=admin">
                                <i class="bi bi-file-text"></i> Administration Article
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?c=admin">
                                <i class="bi bi-tags"></i> Administration Category
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 text-center mb-5">
                        <i class="bi bi-newspaper"></i> Page d'accueil
                    </h1>


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
                                <div class="row">
                                    <?php
                                    // tant qu'on a des articles
                                    $i = 1;
                                    foreach ($nosArticle as $item):
                                    ?>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div id="article<?= $i ?>" class="card h-100 shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <i class="bi bi-file-text"></i> <?= html_entity_decode($item->getArticleTitle()) ?>
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        <i class="bi bi-calendar"></i> Écrit le <?= $item->getArticleDate() ?>
                                                    </h6>
                                                    <p class="card-text"><?= nl2br(html_entity_decode($item->getArticleText())) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <!-- Section Catégories -->
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="h3 mb-4">
                                <i class="bi bi-tags"></i> Catégories de notre site
                            </h2>
                            <?php if (empty($nosCategory)): ?>
                                <div class="alert alert-info" role="alert">
                                    <i class="bi bi-info-circle"></i> Pas encore de catégories sur notre site
                                </div>
                            <?php else: ?>
                                <?php
                                $nbCategory = count($nosCategory);
                                $pluriel = $nbCategory > 1 ? "s" : "";
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <i class="bi bi-check-circle"></i> Il y a <?= $nbCategory ?> catégorie<?= $pluriel ?>
                                </div>
                                <div class="row">
                                    <?php
                                    // tant qu'on a des catégories
                                    $i = 1;
                                    foreach ($nosCategory as $cat):
                                    ?>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div id="category<?= $i ?>" class="card h-100 shadow-sm border-info">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <i class="bi bi-tag"></i> <?= html_entity_decode($cat->getCategoryName()) ?>
                                                    </h5>
                                                    <p class="card-text"><?= nl2br(html_entity_decode($cat->getCategoryDesc())) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>