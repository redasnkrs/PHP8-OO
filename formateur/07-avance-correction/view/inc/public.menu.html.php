<nav>
    <a href ="./">Accueil</a> | Nos catégories :
    <?php
    foreach ($nosCategory as $item):
    ?>
        | <a href ="./?p=category&slug=<?=$item->getCategorySlug()?>"><?=html_entity_decode($item->getCategoryName())?></a>
    <?php
    endforeach;
    ?>
    | Administrations : | <a href ="./?articleAdmin">Administration Article</a> | <a href ="./?categoryAdmin">Administration Category</a>
</nav>
