<?php
declare(strict_types=1);

require_once "../config.php";

// utilisation de la racine pour construire nos include, require etc.
require_once RACINE_PATH."/model/AbstractMapping.php";
require_once RACINE_PATH."/model/ArticleMapping.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'hydratation via la classe abstraite</title>
</head>
<body>
<h1>L'hydratation via la classe abstraite</h1>
<p></p>
<?php
$article1 = new ArticleMapping([
        "id" => 7,
        "plouc" => "lala",
        "article_title"=> "hjgjyfyjutuyt",
        "article_slug"=> "DKEFFFFguyty-sdgffeg-zertreyt",
]);
?>
</body>
</html>
