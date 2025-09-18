<?php

class ElfeVoleur extends ElfePerso
{
    protected int $agilite = 50;

    protected function initialisePerso()
    {
        parent::initialisePerso();
        $agilite = $this->getAgilite() + mt_rand(1, self::DES_DE_SIX);
        $this->setAgilite($agilite);

    }

    public function attaquer(MyPersoAbstract $other)
    {
        $string = "<b>{$this->getName()} vole et attaque {$other->getName()}</b><br>";
        return $string;
    }

    protected function blesser()
    {
        // À compléter selon votre logique
    }
}