<?php
// view/homepage.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouvel article</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

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

        h1, h2 {
            text-align: center;
            color: #5a189a;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .container-content {
            max-width: 700px;
            margin: 0 auto;
            padding: 25px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        label {
            font-weight: 500;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #7b2cbf;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #5a189a;
        }

        p.message {
            color: red;
            font-weight: bold;
            text-align: center;
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
                <li class="nav-item"><a class="nav-link" href="./?p=admin">Administration</a></li>
                <li class="nav-item"><a class="nav-link" href="?p=create">Créer un article</a></li>
                <li class="nav-item"><a class="nav-link" href="?p=charts">Statistiques</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu principal -->
<div class="container-content">
    
    <h2>Création d'un nouvel article</h2>

    <?php if(isset($message)): ?>
        <p class="message"><?=$message?></p>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="article_title">Titre de l'article</label>
            <input type="text" name="article_title" id="article_title" required>
        </div>

        <div class="mb-3">
            <label for="article_text">Texte de l'article</label>
            <textarea name="article_text" id="article_text" cols="30" rows="10" required></textarea>
        </div>

        <div class="mb-3">
            <label for="article_visibility">Visibilité de l'article</label>
            <select name="article_visibility" id="article_visibility" required>
                <option value="1">Visible</option>
                <option value="0">Non visible</option>
            </select>
        </div>

        <div class="text-center">
            <input type="submit" value="Créer l'article">
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
