<?php
// Le nom de la classe doit être le même que celui du fichier
// on, déclare une classe avec le mot clf "class{}".
// Une classe par fichier

class LaVoiture {
    // Propriétés
    private ?string $marque = null;
    private ?int $annee_sortie = null;
    private ?int $nb_chevaux = null;
    private ?string $modele = null;

    // Constantes
    public const VOITURE_NEUVE = true; // par défaut

    private const MOTORISATION = "Essence";

    // Méthodes
    /* Le constructeur est une méthode publique magique qui est appelée lors de l'instanciation de la classe dans laquelle il se trouve (new). */
    public function __construct(string $laMarque, int $year, int $nbChevaux, string $model) {
        // Application immédiate de la valeur aux propriétés, courant, mais à éviter pour des raisons de sécurités
        $this->marque = $laMarque;
        $this->annee_sortie = $year;
        $this->nb_chevaux = $nbChevaux;
        $this->modele = $model;
    }
}