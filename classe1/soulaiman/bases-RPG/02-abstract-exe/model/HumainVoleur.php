<?php


class HumainVoleur extends HumainPerso
{
    protected int $agilite = 50;

    protected function initialisePerso()
    {
        parent::initialisePerso();
        $agilite = $this->getAgilite() + mt_rand(1, self::DES_DE_SIX);
        $this->setAgilite($agilite);
        $string = "<h3>Création du personnage Humain Voleur nommé {$this->getName()}</h3>";
        $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Blesse {$this->getBlesse()}<br>XP {$this->getXp()}</p>";
        echo $string;
    }

   public function attaquer(MyPersoAbstract $other)
{
    echo "<h2>Début du combat entre {$this->getName()} et {$other->getName()}</h2>";
    while ($this->getVie() > 0 && $other->getVie() > 0) {
        // Attaque du joueur courant
        $degats = $this->blesser();
        $vieRestante = $other->getVie() - $degats;
        $other->setVie(max(0, $vieRestante));
        echo "<b>{$this->getName()} attaque {$other->getName()}</b><br>";
        echo "{$other->getName()} perd $degats points de vie. Il lui reste {$other->getVie()} points.<br>";

        if ($other->getVie() <= 0) {
            echo "<b>{$this->getName()} a gagné le combat !</b><br>";
            $this->setXp($this->getXp() + 10);
            break;
        }

        // Riposte de l'adversaire
        $degatsAdversaire = $other->blesser();
        $vieRestanteMoi = $this->getVie() - $degatsAdversaire;
        $this->setVie(max(0, $vieRestanteMoi));
        echo "<b>{$other->getName()} riposte et attaque {$this->getName()}</b><br>";
        echo "{$this->getName()} perd $degatsAdversaire points de vie. Il lui reste {$this->getVie()} points.<br>";

        if ($this->getVie() <= 0) {
            echo "<b>{$other->getName()} a gagné le combat !</b><br>";
            $other->setXp($other->getXp() + 10);
            break;
        }
    }
}

 protected function blesser()
{
    // Calcul des dégâts : agilité + blessure + un dé de 6
    $degats = $this->getAgilite() + $this->getBlesse() + mt_rand(1, self::DES_DE_SIX);
    return $degats;
}
}