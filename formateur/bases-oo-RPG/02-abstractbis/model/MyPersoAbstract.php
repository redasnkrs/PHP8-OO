<?php

abstract class MyPersoAbstract{
    // properties
    protected ?string $name=null;
    protected ?string $espece_perso=null;

    protected ?int $vie = 1000;

    // constantes
    public const int DES_DE_SIX = 6;
    public const int DES_DE_DOUZE = 12;

    public const array CHOIX_ESPECE = [
        "Humain",
        "Elfe",
        "Nain",
        "Orc",
        "Hobbit",
        "Gobelin",
    ];

    // constructeur commun
    public function __construct(string $nom, string $espece){
        $this->setName($nom);
    }

    // méthodes abstraites
    abstract public function attaquer(MyPersoAbstract $other);
    abstract protected function initialisePerso();
    abstract protected function gagner();



    // getters and setters

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getVie(): ?int
    {
        return $this->vie;
    }

    public function setVie(?int $vie): void
    {
        $this->vie = $vie;
    }

    public function getEspecePerso(): ?string
    {
        return $this->espece_perso;
    }

    public function setEspecePerso(?string $espece_perso): void
    {
        $this->espece_perso = $espece_perso;
    }



}