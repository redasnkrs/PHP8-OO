# PHP8-OO
La Programmation Orienté Objet en PHP 8.0 et vers l'avenir

## L'orienté objet, en PHP et dans d'autres langages, est également nommé POO (programmation orientée objet).

C'est un paradigme de programmation informatique.

## La POO consiste en la définition et l'interaction de briques logicielles appelées objets.

Un objet représente un concept, une idée ou toute entité du monde physique, comme une voiture, une personne ou encore une page d'un livre. Il possède une structure interne et un comportement, et il sait interagir avec ses pairs.

Il s'agit donc de représenter ces objets et leurs relations. L'interaction entre les objets via leurs relations permet de concevoir et réaliser les fonctionnalités attendues, de mieux résoudre le ou les problèmes. Dès lors, l'étape de modélisation revêt une importance majeure et nécessaire pour la POO. C'est elle qui permet de transcrire les éléments du réel sous forme virtuelle.

## Attention ce cours est destiné à des apprenants qui ont des bases en PHP et qui veulent rendre leur code plus structuré et mieux organisé.
Une connaissance au modèle MVC est une plus

# Apprendre la POO et le MVC en PHP 8.3

Bienvenue dans ce cours sur la Programmation Orientée Objet (POO) et le patron de conception **MVC** (Modèle-Vue-Contrôleur) en **PHP 8.3** (le plus utilisé à ce jour).

L'objectif est de te faire passer d'une approche procédurale à une approche objet, en te montrant comment la POO peut rendre ton code plus organisé, plus facile à maintenir et à faire évoluer.

# Crée un fork de ce projet sur GitHub

Après avoir changé de branche et cloné ton fork rajoute l'upstream et ensuite crée un dossier à ton nom dans la bonne classe avec une copie de `01 site procédural en MVC - à modifier` . Soumets-moi lu pull request pour bien commencer. On modifiera ce projet au fur et à mesure qu'on avancera en Orienté Objet !

## 1. Du PHP procédural à la POO

Dans le dossier `formateur/01 site procédural en MVC - à modifier`, vous avez un site en MVC procédural fonctionnel

En PHP procédural, tu as l'habitude de créer des fonctions comme `afficher_utilisateur()` ou `creer_utilisateur()`. Le code est exécuté de manière linéaire.

En POO, on pense en termes d'**objets**. Un objet regroupe à la fois des **données** (des propriétés, par exemple `$nom`, `$email`) et des **actions** (des méthodes, par exemple `sauvegarder()`, `supprimer()`).

Ceci nous permet de créer un "moule" appelé **classe** pour représenter des choses du monde réel, comme un utilisateur.

### 02 Exemple simple : Création d'une classe `Utilisateur`

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
