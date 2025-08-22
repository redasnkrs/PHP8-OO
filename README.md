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
## 1.2 Les classes et les objets
   Définition : Une classe est une structure qui permet de définir des objets. Une classe est un modèle qui décrit les caractéristiques communes d'un groupe d'objets.

Un objet est une instance d'une classe. Un objet est une entité qui possède des propriétés, des constantes et des méthodes.

## 1.1. Déclaration d'une classe
La déclaration d'une classe en PHP commence par le mot clé class, suivi du nom de la classe et de son contenu entre accolades. Voici un exemple de déclaration de classe en PHP

```php

class MaClasse {
// Propriétés
private $proprietePrivee;
public $proprietePublique = 'Valeur par défaut';

    // Constantes
    const MA_CONSTANTE = 'Valeur constante';

    // Méthodes
    public function methodePublique() {
        echo "Ceci est une méthode publique";
    }
    
    private function methodePrivee() {
        echo "Ceci est une méthode privée";
    }
}
```
Dans cet exemple, la classe s'appelle MaClasse. Elle a deux propriétés : une propriété privée $proprietePrivee et une propriété publique $proprietePublique initialisée à 'Valeur par défaut'.

Elle a également une constante MA_CONSTANTE initialisée à 'Valeur constante'. Elle est accessible depuis l'extérieur de la classe en utilisant le nom de la classe suivi de l'opérateur de résolution de portée `::` et du nom de la constante.

Par exemple, pour accéder à la constante MA_CONSTANTE depuis l'extérieur de la classe, on écrira :

```php
<?php
echo MaClasse::MA_CONSTANTE;
```

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
```

