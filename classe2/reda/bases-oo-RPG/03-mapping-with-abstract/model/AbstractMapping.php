<?php


abstract class AbstractMapping
{



    // transforme un titre en slug, ici depuis la class car static
    static public function slugify(string $text, string $separator = '-'): string
    {
        // 1. Remplacer les caractères non-alphanumériques par le séparateur
        // \p{L} correspond à n'importe quelle lettre dans n'importe quelle langue
        // \p{N} correspond à n'importe quel chiffre
        // Le 'u' à la fin est pour le support de l'UTF-8
        $text = preg_replace('~[^\pL\d]+~u', $separator, $text);

        // 2. Translittérer les caractères accentués en ASCII
        // Par exemple : 'é' devient 'e'
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // 3. Supprimer les caractères qui ne sont ni des tirets, ni alphanumériques
        $text = preg_replace('~[^-\w]+~', '', $text);

        // 4. Supprimer les séparateurs en début et fin de chaîne
        $text = trim($text, $separator);

        // 5. Supprimer les séparateurs en double
        $text = preg_replace('~-+~', $separator, $text);

        // 6. Mettre toute la chaîne en minuscules
        $text = strtolower($text);

        if (empty($text)) {
            throw new Exception("Slugify failed");
        }

        // 7. On va rajouter des caractères hexadécimaux
        // au début de la chaîne au hasard, pour éviter
        // les doublons
        $text = bin2hex(random_bytes(2))."-".$text;

        // 8. On retourne la chaîne
        return $text;
    }
}