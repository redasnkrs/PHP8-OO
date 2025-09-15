<?php

class Persoo {

    // Propriétés
    private ?string $name = null;
    private ?string $espece = null;
    private ?int $endurance = null;


    // Constantes
    const ESPECE_PERSO = ["Humain", "Elfe", "Nain", "Orc", "Hobbit", "Gobelin"];
    private const PETIT_DES = 6;
    private const GRAND_DES = 12;


    // Constructeur
    public function __construct(string $name, string $espece) {
        // Appel des setters
        $this->setName($name);
        $this->setEspece($espece);
        // Appel d'une méthode private
        $this->initializePersoo();
    }

    // Méthodes
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $name = trim($name);
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $name)) {
            throw new Exception("Le nom doit commencer par une lettre, ne pas contenir d'espaces et ne peut contenir que des lettres et des chiffres.");
        } else {
            $this->name = $name;
        }
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): void
    {
        if (!in_array($espece, self::ESPECE_PERSO)) {
            throw new Exception("Cette espèce n'est pas accepté dans le jeu");
        } else {
            $this->espece = $espece;
        }
    }

    public function attaqueEnnemi(Persoo $other):string {
        return "$this->name attaque {$other->getName()}";
    }

    private function initializePersoo(): void {
        $this->endurance = (self::GRAND_DES*(rand(1,2))) + (self::PETIT_DES*(rand(3,5)));
    }

}
