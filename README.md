# PHP8-OO
L'Orienté Objet en PHP 8.0 et vers l'avenir

## Attention ce cours est destiné à des apprenants qui ont des bases en PHP et qui veulent rendre leur code plus structuré et mieux organisé.
Une connaissance au modèle MVC est une plus

# Apprendre la POO et le MVC en PHP 8.3

Bienvenue dans ce cours sur la Programmation Orientée Objet (POO) et le patron de conception **MVC** (Modèle-Vue-Contrôleur) en **PHP 8.3** (le plus utilisé à ce jour).

L'objectif est de te faire passer d'une approche procédurale à une approche objet, en te montrant comment la POO peut rendre ton code plus organisé, plus facile à maintenir et à faire évoluer.

## 1. Du PHP procédural à la POO

En PHP procédural, tu as l'habitude de créer des fonctions comme `afficher_utilisateur()` ou `creer_utilisateur()`. Le code est exécuté de manière linéaire.

En POO, on pense en termes d'**objets**. Un objet regroupe à la fois des **données** (des propriétés, par exemple `$nom`, `$email`) et des **actions** (des méthodes, par exemple `sauvegarder()`, `supprimer()`).

Ceci nous permet de créer un "moule" appelé **classe** pour représenter des choses du monde réel, comme un utilisateur.

### Exemple simple : Création d'une classe `Utilisateur`

Disons que tu veux gérer des utilisateurs. En procédural, tu aurais un tableau pour chaque utilisateur et des fonctions séparées.

En POO, nous allons créer une **classe `Utilisateur`**.

```php
<?php

// Création d'une classe
class Utilisateur {
    // Propriétés (données)
    public string $nom;
    public string $email;
    private int $motDePasse; // On protège le mot de passe !

    // Méthode (action) pour saluer l'utilisateur
    public function saluer(): string {
        return "Bonjour, je m'appelle " . $this->nom;
    }
}

// Créer un objet (une instance de la classe)
$pierre = new Utilisateur();

// Affecter des valeurs aux propriétés
$pierre->nom = "Pierre Dupont";
$pierre->email = "pierre.dupont@email.com";

// Appeler une méthode de l'objet
echo $pierre->saluer(); // Affiche "Bonjour, je m'appelle Pierre Dupont"
