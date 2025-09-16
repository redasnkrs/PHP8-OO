<?php

class MyPerso extends MyPersoAbstract
{

    protected int $force = 20;

    // surcharger le constructeur
    public function __construct(string $nom)
    {
        $this->initialisePerso();
        parent::__construct($nom);
    }

    // méthode private pour un personnage sans magie
    protected function initialisePerso():void
    {
        $bonusVie = $this->getVie() + (mt_rand(10,20))* self::DES_DE_DOUZE;
        $this->setVie($bonusVie);
    }


    // méthode abstraite, doit être réinitialisée
    public function attaquer(MyPersoAbstract $other):string
    {
        return "{$this->getName()} Attaque {$other->getName()}<br>";
    }

    public function getForce(): int
    {
        return $this->force;
    }

    public function setForce(int $force): void
    {
        $this->force = $force;
    }

}