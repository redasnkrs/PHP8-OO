<?php

class Perso
{
    // propriétés
    private ?int $id = null;
    private ?string $nickname = null;
    private ?string $race = null;
    private ?int $health = null;

    // depuis PHP 8.1, on peut utiliser readonly, évitez pour le moment
    public readonly ?string $spec;

    // constantes
    public const int BEGIN_HEALTH = 100;
    private const array RACE = ["Humain", "Elf", "Orque"];

    // Méthodes

    // Constructeur : méthode magique appelée lors de l'instanciation.

    public function __construct(string $nick,string $larace)
    {
        echo "J'ai construit un utilisateur<br>";
        // $this => instance de classe (objet)
        $this->nickname = $nick;
        $this->race = $larace;
        // on modifie notre propriété en readonly
        $this->spec = uniqid();
        echo "J'ai directement affecté les valeurs aux propriétés (mauvaise pratique):<br>";
        echo '$this->nickname = $nick; =>'.$this->nickname.'<br>';
        echo '$this->race = $larace; =>'.$this->race.'<br>';
        // affichage des constantes depuis la classe : self
        echo "Santé: ".self::BEGIN_HEALTH;
        // affichage d'une constante privée (que dans la classe)
        var_dump(self::RACE);
    }

}