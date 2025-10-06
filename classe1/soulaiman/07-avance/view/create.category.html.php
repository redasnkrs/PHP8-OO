<?php
// view/createCategory.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Nouvelle catégorie</title>

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

        h1, h2 {
            text-align: center;
            color: #5a189a;
            font-weight: bold;
        }

        .container-content {
            max-width: 700px;
            margin: 0 auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        label {
            font-weight: 500;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #7b2cbf;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5a189a;
        }

        .alert {
            color: #e63946;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }
        nav a {
            color: #7b2cbf;
            text-decoration: none;
            font-weight: 500;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
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
    
    <h2>Création d'une nouvelle catégorie</h2>

    <?php if(isset($message)): ?>
        <div class="alert"><?=$message?></div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="category_name">Nom de la catégorie</label>
        <input type="text" name="category_name" id="category_name" required>

        <label for="category_desc">Description de la catégorie</label>
        <textarea name="category_desc" id="category_desc" rows="6" required></textarea>
<div class="text-center">
        <input type="submit" value="Créer la catégorie">
</div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
