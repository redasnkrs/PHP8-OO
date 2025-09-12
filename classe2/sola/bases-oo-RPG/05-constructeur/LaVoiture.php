<?php

class LaVoiture {
    // propriétés
    private ?string $marque = null;
    
    // constantes
    private ?int $annee_sortie = null;
    
    private ?int $chevaux = null;
    private ?string $modele = null;
    public const  VOITURE_NEUVE = true; // par défaut public
    
    private const  MOTORISATION = "Essence"; // par défaut public
    // méthodes 
    
    /* Le constructeur est une méthode magique qui est appelée lors de l'instanciation de la classe dans laquelle il se trouve (new) */
    
    public function __construct(string $LaMarque, int $year,int $horse_power) {
        $this->marque = $LaMarque;
        $this->annee_sortie = $year;
        $this->chevaux = $horse_power;
    }
}