<?php

class ElfeMagicienBlanc extends ElfePerso
{

    protected int $magie = 30;


    protected function initialisePerso()
    {
        parent::initialisePerso();
        // gestion de la magie de départ
        $magie = $this->getMagie() + mt_rand(1,self::DES_DE_DOUZE)+ mt_rand(1,self::DES_DE_DOUZE);
        $this->setMagie($magie);
        // sortie texte
      

    }

    public function attaquer(MyPersoAbstract $other)
    {
        $string="<b>{$this->getName()} Attaque {$other->getName()}</b><br>";
        return $string;

    }
    protected function blesser()
    {
        // TODO: Implement blesser() method.
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