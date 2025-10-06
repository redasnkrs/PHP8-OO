<?php // view/homepage.html.php ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'accueil</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 80px;
            background-color: #f8f9fa;
            font-family: "Segoe UI", sans-serif;
        }

        /* --- NAVBAR MAUVE --- */
        .navbar {
            transition: all 0.3s ease-in-out;
            background-color: #7b2cbf; /* Mauve principal */
        }
        .navbar.scrolled {
            background-color: #5a189a; /* Mauve foncé au scroll */
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin: 0 10px;
            border-radius: 25px;
            padding: 8px 16px !important;
            transition: all 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            background-color: #fff;
            color: #7b2cbf !important;
        }

        /* --- TITRES ET SECTIONS --- */
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #5a189a;
        }

        h4 {
            color: #6a1b9a;
        }

        .scroll-zone {
            max-height: 70vh;
            overflow-y: auto;
            padding: 2rem;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border: 1px solid #e0c3fc;
        }

        .article, .category {
            border-bottom: 1px solid #e0c3fc;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }

        .container-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 15px;
        }

        hr {
            margin: 50px auto;
            width: 60%;
            border-top: 2px solid #d0a6f3;
        }

        /* --- DIVISION DE PAGE --- */
        .content-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .col-half {
            flex: 1 1 48%;
        }

        @media (max-width: 768px) {
            .col-half {
                flex: 1 1 100%;
            }
        }

        /* Scroll personnalisé */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #b185db;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: #7b2cbf;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="#articles">Accueil
 </a></li>
               
                <li class="nav-item"><a class="nav-link" href="./?p=admin">Admin Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="./?c=admin">Admin Catégories</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENU PRINCIPAL DIVISÉ EN 2 PARTIES -->
<div class="container-section">
    <div class="content-row">

        <!-- PARTIE ARTICLES -->
        <div id="articles" class="col-half">
            <h2>Articles de notre site</h2>
            <div class="scroll-zone">
                <?php
                if (empty($nosArticle)):
                ?>
                    <h3 class="text-center text-muted">Pas encore d'articles sur notre site</h3>
                <?php
                else:
                    $nbArticle = count($nosArticle);
                    $pluriel = $nbArticle > 1 ? "s" : "";
                ?>
                    <h4 class="text-center mb-4">Il y a <?=$nbArticle?> article<?=$pluriel?></h4>
                    <?php
                    $i = 1;
                    foreach ($nosArticle as $item):
                    ?>
                        <div id="article<?=$i?>" class="article">
                            <h5><?=html_entity_decode($item->getArticleTitle())?></h5>
                            <h6 class="text-muted">Écrit le <?=$item->getArticleDate()?></h6>
                            <p><?=nl2br(html_entity_decode($item->getArticleText()))?></p>
                        </div>
                    <?php
                        $i++;
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <!-- PARTIE CATÉGORIES -->
        <div id="categories" class="col-half">
            <h2>Catégories de notre site</h2>
            <div class="scroll-zone">
                <?php
                if (empty($nosCategory)):
                ?>
                    <h3 class="text-center text-muted">Pas encore de catégories sur notre site</h3>
                <?php
                else:
                    $nbCategory = count($nosCategory);
                    $pluriel = $nbCategory > 1 ? "s" : "";
                ?>
                    <h4 class="text-center mb-4">Il y a <?=$nbCategory?> catégorie<?=$pluriel?></h4>
                    <?php
                    $j = 1;
                    foreach ($nosCategory as $item):
                    ?>
                        <div id="category<?=$j?>" class="category">
                            <h5><?=html_entity_decode($item->getCategoryName())?></h5>
                            <p><?=nl2br(html_entity_decode($item->getCategoryDesc()))?></p>
                        </div>
                    <?php
                        $j++;
                    endforeach;
                endif;
                ?>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
