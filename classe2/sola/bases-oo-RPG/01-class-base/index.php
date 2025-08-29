<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
    <main>
        <h1>Création et importation d'une classe</h1>
        <h2>Importation</h2>
        <p>Chaque classe devra se trouver dans un ficher unique, qui portera le même nom que la classe (autoload)</p>
        <p>Nous allons le charger ci-dessous, (se fait en principe avant le doctype)</p>
        <code>include "Personnage.php"</code>
        <?php include "Personnage.php" ?>
        <h2>Instanciation d'objets de type Personnage</h2>
        <p>En OO, on instancie (création d'un objet) la classe avec le mot clé 'new'</p>
        <pre><code>
           // création d'une instance de type Personnage
              $perso1 = new Personnage();
        </code></pre>
        <?php
            // création de 2 instances de type Personnage contenue dans des alias vers la mémoire où se trouve l'objet
            $perso1 = new Personnage();
            $perso2 = new Personnage();
            
            // $perso3 n'est qu'un lien symbolique vers $perso1 
            // il faudra utiliser le clonage pour faire une copie
            // avec un nouvel espace mémoire
            $perso3 = $perso1;
        ?>
    </main>
</body>
</html>