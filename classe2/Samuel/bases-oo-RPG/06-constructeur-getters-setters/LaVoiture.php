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
    public const NOS_MARQUES = ['Mercedes', 'Volvo', 'BMW', 'Fiat', 'Citroën'];
    private const MOTORISATION = "Essence";

    // Méthodes
    /* Le constructeur est une méthode publique magique qui est appelée lors de l'instanciation de la classe dans laquelle il se trouve (new). */
    public function __construct(string $laMarque, int $year, int $nbChevaux, string $model) {
        // Utilisation des setters pour protéger les entrées lors de la création de l'instance
        $this->setMarque($laMarque);
        $this->setAnneeSortie($year);
        $this->setNbChevaux($nbChevaux);
        $this->setModele($model);
    }

    // Getters

    // getMarque pour récupérer la marque
    public function getMarque(): ?string {
        return $this->marque;
    }

    // getAnneeSortie pour récupérer l'année de sortie
    public function getAnneeSortie(): ?int {
        return $this->annee_sortie;
    }

    // getNbChevaux pour récupérer le nombre de chevaux
    public function getNbChevaux(): ?int {
        return $this->nb_chevaux;
    }

    // getModele pour récupérer le modèle
    public function getModele(): ?string {
        return $this->modele;
    }

    // Setters

    // setMarque pour modifier la marque
    public function setMarque(string $marque): void {
        $traiteMarque = htmlspecialchars(strip_tags(trim($marque)));
        if (!in_array($traiteMarque, self::NOS_MARQUES, true)) {
            throw new InvalidArgumentException('Marque non autorisée.');
        } else {
            $this->marque = $marque;
        }
    }

    // setAnneeSortie pour modifier l'année de sortie
    public function setAnneeSortie(int $year): void {
        $yearMax = (int)date('Y');
        if ($year < 1800 || $year > $yearMax) {
            throw new InvalidArgumentException("L'année de sortie doit être comprise entre 1800 et $yearMax");
        } else {
            $this->annee_sortie = $year;
        }
    }

    // setNbChevaux pour modifier le nombre de chevaux
    public function setNbChevaux(int $nbChevaux): void {
        if ($nbChevaux < 50 || $nbChevaux > 1000) {
            throw new InvalidArgumentException("Le nombre de chevaux doit être compris entre 50 et 1000");
        } else {
            $this->nb_chevaux = $nbChevaux;
        }

    }

    // setModele pour modifier le modèle
    public function setModele(string $modele): void {
        $traiteModele = htmlspecialchars(trim(strip_tags($modele)));
        if ($traiteModele === "") {
            throw new InvalidArgumentException("Le champ ne peut être vide.");
        } else if (strlen($traiteModele) < 3) {
            throw new InvalidArgumentException("La longueur doit être supérieure à 3");
        } else if (strlen($traiteModele) > 20) {
            throw new InvalidArgumentException("La longueur du modèle doit être inférieure à 20");
        } else {
            $this->modele = $traiteModele;
        }
    }
}