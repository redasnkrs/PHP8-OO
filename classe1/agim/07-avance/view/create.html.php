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
    <title><?= isset($_GET['p']) ? 'Nouvel article' : 'Nouvelle catégorie' ?></title>
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
                    <i class="bi bi-plus-circle"></i> <?= isset($_GET['p']) ? 'Nouvel article' : 'Nouvelle catégorie' ?>
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
                        <?php if (isset($_GET['p'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./?p=admin">
                                    <i class="bi bi-file-text"></i> Administration Articles
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./?c=admin">
                                    <i class="bi bi-tags"></i> Administration Catégories
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h1 class="h3 mb-0">
                                <i class="bi bi-<?= isset($_GET['p']) ? 'file-text' : 'tag' ?>"></i>
                                <?= isset($_GET['p']) ? 'Nouvel article' : 'Nouvelle catégorie' ?>
                            </h1>
                        </div>
                        <div class="card-body">
                            <h2 class="h5 mb-4">
                                <i class="bi bi-plus-circle"></i>
                                <?= isset($_GET['p']) ? 'Création d\'un nouvel article' : 'Création d\'une nouvelle catégorie' ?>
                            </h2>
                            
                            <?php
                            if (isset($message)):
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="bi bi-exclamation-triangle"></i> <?= $message ?>
                                </div>
                            <?php
                            endif;
                            ?>

                            <?php if (isset($_GET['p'])): ?>
                                <!-- Formulaire Article -->
                                <form action="" method="post" name="name">
                                    <div class="mb-3">
                                        <label for="article_title" class="form-label">
                                            <i class="bi bi-file-text"></i> Titre de l'article
                                        </label>
                                        <input type="text" class="form-control" name="article_title" id="article_title" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="article_text" class="form-label">
                                            <i class="bi bi-text-paragraph"></i> Texte de l'article
                                        </label>
                                        <textarea class="form-control" name="article_text" id="article_text" rows="10" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="article_visibility" class="form-label">
                                            <i class="bi bi-eye"></i> Visibilité de l'article
                                        </label>
                                        <select class="form-select" name="article_visibility" id="article_visibility" required>
                                            <option value="1">Visible</option>
                                            <option value="0">Non visible</option>
                                        </select>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-plus-circle"></i> Créer l'article
                                        </button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <!-- Formulaire Catégorie -->
                                <form action="" method="post" name="category_form">
                                    <div class="mb-3">
                                        <label for="category_name" class="form-label">
                                            <i class="bi bi-tag"></i> Nom de la catégorie
                                        </label>
                                        <input type="text" class="form-control" name="category_name" id="category_name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="category_desc" class="form-label">
                                            <i class="bi bi-text-paragraph"></i> Description de la catégorie
                                        </label>
                                        <textarea class="form-control" name="category_desc" id="category_desc" rows="5" required></textarea>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-plus-circle"></i> Créer la catégorie
                                        </button>
                                    </div>
                                </form>
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