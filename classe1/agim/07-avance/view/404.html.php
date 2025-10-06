<?php
// view/404.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erreur 404</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4">
            <div class="container">
                <a class="navbar-brand" href="./">
                    <i class="bi bi-exclamation-triangle"></i> Erreur 404
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
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=admin">
                                <i class="bi bi-file-text"></i> Administration Articles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?p=create">
                                <i class="bi bi-plus-circle"></i> Créer un article
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow">
                        <div class="card-header bg-danger text-white">
                            <h1 class="h3 mb-0">
                                <i class="bi bi-exclamation-triangle"></i> Erreur 404
                            </h1>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 4rem;"></i>
                            </div>
                            
                            <?php
                            if(isset($message)):
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="bi bi-exclamation-triangle"></i> <?=$message?>
                                </div>
                            <?php
                            endif;
                            ?>
                            
                            <h2 class="h4 mb-4">Page non trouvée</h2>
                            <p class="text-muted mb-4">La page que vous recherchez n'existe pas ou a été déplacée.</p>
                            
                            <div class="d-grid gap-2 d-md-block">
                                <a href="./" class="btn btn-primary">
                                    <i class="bi bi-house"></i> Retour à l'accueil
                                </a>
                                <a href="./?p=admin" class="btn btn-outline-primary">
                                    <i class="bi bi-file-text"></i> Administration
                                </a>
                            </div>
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
