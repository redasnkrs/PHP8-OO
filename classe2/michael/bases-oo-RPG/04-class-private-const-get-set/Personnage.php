<?php

// doit avoir le même nom que le fichier
// une classe par fichier
class Personnage{

    // Propriétés (équivalentes de variables)
    // on va mettre la visibilité (obligatoire) à private
    // (pas d'accès en dehors de la classe ni enfants)
    // bonne pratique, snake_case

    private  ?string $le_nom = null; // visibilité obligatoire,
    // typage conseillé null ou string,
    // valeur par default: null

    private ?int $l_age = null; // attend un entier ou null

    private ?bool $est_vivant = null; // attend un booléen ou null

    // Constantes (équivalentes de constantes)
    // elles sont publiques par défaut
    const string LA_RACE = "Humain";
    private const string LE_GENRE = "Masculin";

    // Méthodes (équivalentes aux fonctions)

        // setters


    /**
     * @param string $nom
     * @return void
     * @throws Exception
     */
    public function setLeNom(string $nom): void
        {
            // on va vérifier que le nom respecte les
            // critères imposés
            $thename = trim($nom);

            // A vérifier [A-Za-z] EXRPESSION REG


            // le nom de l'instance est représenté par $this
            if($thename!=="") {
                if(strlen($thename)>=5
                    && strlen($thename)<=25) {
                    $this->le_nom = $thename;
                }else{
                    throw new Exception("nom plus petit que 5 ou plus grand que 25");
                }

            }else{
                throw new Exception("Espaces vides non autorisés");
            }
        }

}