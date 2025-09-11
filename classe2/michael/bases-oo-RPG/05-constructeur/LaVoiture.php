<?php
class LaVoiture{
    // propriétés
    private ?string $marque=null;
    private ?int $annee_sortie=null;
    private ?int $chevaux = null;
    private ?string $model = null;

    // constantes
    const ?bool VOITURE_NEUVE = true; // par défaut publique
    private const ?string MOTORISATION = "Essence";
    // Méthodes

    /* Le constructeur est une méthode publique
    magique qui est appelée lors de l'instanciation
    de la classe dans laquelle il se trouve (new)
    */
    public function __construct(string $laMarque,int $year,){
        $this->marque = $laMarque;
        $this->annee_sortie = $year;
    }

}