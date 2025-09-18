<?php

class ElfeGuerrier extends ElfePerso
{
    protected int $vie = 1200;

    protected function initialisePerso()
    {
        parent::initialisePerso();
        $vie = $this->getVie() + mt_rand(1, self::DES_DE_SIX);
        $this->setVie($vie);
        
    }

    public function attaquer(MyPersoAbstract $other)
    {
        $string = "<b>{$this->getName()} attaque en force {$other->getName()}</b><br>";
        return $string;
    }

    protected function blesser()
    {
        // À compléter selon votre logique
    }
}