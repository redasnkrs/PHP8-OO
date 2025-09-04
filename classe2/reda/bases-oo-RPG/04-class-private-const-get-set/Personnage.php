<?php


// Le nom de la classe doit être le même que celui du fichier
class Personnage
{
 // Propriété (équivalentes de variables)
 // On va mettre la visibilité à private (obligatoire)
 // (pas d'accès en dehors de la classe ni enfants)
 // Bonne pratique, snake_case
 private ?string $le_nom = null; // visibilité obligatoire, typage null ou string.(valeur par defaut null).
 private ?int $l_age = null; // attend un entier
 private ?bool $est_vivant = null; // attend un booléen. 

 // Constantes (équivalentes de constantes)
 // Elles sont publique par défaut 
 const LA_RACE = "Humain"; 
 private const LE_GENRE = "Masculin";
 // Méthodes (équivalentes de fonctions)
}
