<?php
// view/homepage.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Administration des catégories</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 80px;
            background-color: #f8f9fa;
            font-family: "Segoe UI", sans-serif;
        }

        /* Navbar mauve */
        .navbar {
            background-color: #7b2cbf;
            transition: all 0.3s ease-in-out;
        }
        .navbar.scrolled {
            background-color: #5a189a;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin: 0 8px;
            border-radius: 20px;
            padding: 8px 14px !important;
            transition: all 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            background-color: #fff;
            color: #7b2cbf !important;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #5a189a;
            font-weight: bold;
        }

        /* Tableau scrollable */
        .table-wrapper {
            max-height: 500px;
            overflow-y: auto;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th {
            background-color: #7b2cbf !important;
            color: #fff !important;
            text-transform: capitalize;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        tr:nth-child(even) {
            background-color: #f3e9ff;
        }

        tr:hover {
            background-color: #e9d5ff;
        }

        td, th {
            padding: 10px;
            vertical-align: middle;
        }

        /* Boutons d’action */
        .btn-edit {
            text-decoration: none;
            color: #fff;
            background-color: #9c4dcc;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .btn-edit:hover { background-color: #7b2cbf; }

        .btn-delete {
            text-decoration: none;
            color: #fff;
            background-color: #e63946;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .btn-delete:hover { background-color: #c1121f; }

        .container-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h5 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="./">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="./?c=admin">Administration</a></li>
                <li class="nav-item"><a class="nav-link" href="?c=createCateg">Créer une catégorie</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu principal -->
<div class="container-content mt-5">
    <h2>Catégories de notre site</h2>

    <?php if (empty($nosCategory)): ?>
        <h4 class="text-center text-muted">Pas encore de catégories sur notre site</h4>
    <?php else: ?>
        <?php
        $nbCategory = count($nosCategory);
        $pluriel = $nbCategory > 1 ? "s" : "";
        ?>
        <h5>Il y a <?=$nbCategory?> catégorie<?=$pluriel?></h5>

        <div class="table-wrapper">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($nosCategory as $item): ?>
                    <tr>
                        <td><?=$item->getId()?></td>
                        <td><?=html_entity_decode($item->getCategoryName())?></td>
                        <td><?=$item->getCategorySlug()?></td>
                        <td><?=html_entity_decode(substr($item->getCategoryDesc(),0,150))?>...</td>
                        <td><a href="?c=updateCateg&id=<?=$item->getId()?>" class="btn-edit">Modifier</a></td>
                        <td><a href="#" class="btn-delete" onclick="if(confirm('Voulez-vous vraiment supprimer la catégorie <?=$item->getCategorySlug()?> ?')){ document.location ='?c=deleteCateg&id=<?=$item->getId()?>'; }">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
