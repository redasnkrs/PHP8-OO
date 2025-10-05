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
</head>
<body>
    <h1>Administration</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?c=admin">Administration</a> | <a href="?c=createCateg">Création d'un nouvel category</a>
    </nav>
    <h2>Category de notre site</h2>
    <?php
    if(empty($nosCategory)):
    ?>
    <h3>Pas encore de category sur notre site</h3>
    <?php
    else:
        $nbCategory = count($nosCategory);
        $pluriel = $nbCategory > 1? "s" : "";
    ?>
    <h3>Il y a <?=$nbCategory?> category<?=$pluriel?> </h3>

        <table>
            <thead>
                <th>id</th>
                <th>category_nom</th>
                <th>category_slug</th>
                <th>category_desc</th>
                <th>update</th>
                <th>delete</th>
            </thead>
            <?php
                foreach ($nosCategory as $item):
            ?>
            <tr>
                <td><?=$item->getId()?></td>
                <td><?=html_entity_decode($item->getCategoryName())?></td>
                <td><?=$item->getCategorySlug()?></td>
                <td><?=html_entity_decode(substr($item->getCategoryDesc(),0,150))?></td>
                <td><a href="?c=updateCateg&id=<?=$item->getId()?>">update</a></td>
                <td><a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer l\'article <?=$item->getCategorySlug()?>'); if(a){ document.location ='?c=deleteCateg&id=<?=$item->getId()?>';}">delete</a></td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </table>


<?php //var_dump($connectPDO,$ArticleManager,$nosArticle); ?>
</body>
</html>
