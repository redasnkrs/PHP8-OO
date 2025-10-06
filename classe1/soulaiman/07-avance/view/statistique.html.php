<?php
// view/stats.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistiques</title>

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
            margin-bottom: 30px;
            color: #5a189a;
            font-weight: bold;
        }

        .container-content {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .card {
            border-radius: 12px;
            margin-bottom: 30px;
        }

        canvas {
            /* scroll horizontal si nécessaire */
            overflow-x: auto;
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
    <h1>Statistiques</h1>

    <!-- Graphique en aires -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Exemple de graphique en aires
        </div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="40"></canvas>
        </div>
    </div>

    <div class="row">
        <!-- Graphique en barres -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Exemple de graphique en barres
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>

        <!-- Graphique circulaire -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Répartition des articles (Graphique circulaire)
                </div>
                <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>



<!-- Graphiques -->
<script>
    const statsData = <?= json_encode($stats) ?>;
    const labels = statsData.map(item => item.mois);
    const data = statsData.map(item => item.total);

    // Graphique en aires
    new Chart(document.getElementById("myAreaChart").getContext('2d'), {
        type: 'line',
        data: { labels, datasets: [{ label: "Articles publiés", data, backgroundColor: "rgba(123,44,191,0.2)", borderColor: "#7b2cbf", borderWidth: 2 }] },
        options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
    });

    // Graphique en barres
    new Chart(document.getElementById("myBarChart").getContext('2d'), {
        type: 'bar',
        data: { labels, datasets: [{ label: "Articles publiés", data, backgroundColor: "rgba(123,44,191,0.5)", borderColor: "#7b2cbf", borderWidth: 1 }] },
        options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
    });

    // Graphique circulaire
    new Chart(document.getElementById("myPieChart").getContext('2d'), {
        type: 'pie',
        data: { labels, datasets: [{ label: "Articles publiés", data, backgroundColor: [
            "#007bff", "#28a745", "#ffc107", "#dc3545", "#17a2b8", "#6f42c1", "#fd7e14", "#20c997",
            "#e83e8c", "#343a40", "#6610f2", "#ff5733", "#33ff57", "#3357ff", "#f333ff", "#33fff5",
            "#f5ff33", "#ff33a8", "#a833ff", "#33ffa8", "#ffa833", "#33a8ff", "#a8ff33", "#ff3380"
        ] }] }
    });
</script>

</body>
</html>
