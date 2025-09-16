<?php

class MyPersoMagicien extends MyPersoAbstract
{

    protected int $magie = 20;
    // surcharger le constructeur
    public function __construct(string $nom)
    {
        $this->initialisePerso();
        parent::__construct($nom);
    }

// méthode private pour un personnage sans magie
    protected function initialisePerso(){
        // bonus magie
        $bonusMagie = $this->getMagie() + (mt_rand(1,self::DES_DE_DOUZE)) ;
        $this->setMagie($bonusMagie);
        // vie
        $malusVie = $this->getVie() - (mt_rand(10,20))* self::DES_DE_SIX;
        $this->setVie($malusVie);
    }
    public function attaquer(MyPersoAbstract $other)
    {
        return "{$this->getName()} Attaque {$other->getName()}<br>";
    }
    public function getMagie(): int
    {
        return $this->magie;
    }
    public function setMagie(int $magie): void
    {
        $this->magie = $magie;
    }

}