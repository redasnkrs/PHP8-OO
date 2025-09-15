<?php
// use Exception;
class Stagiaire{

    // propriétés private
    private ?string $le_nom=null;
    private ?string $le_prenom=null;

    // constantes

    // par défaut une constante est public

    const string EST_VIVANT= "oui";


    // méthodes

        // setters (permettent de modifier les propriétés en
        // mettant des règles plus strictes)

        public function setLeNom(string $nom): void
        {

            // pas d'espaces vides devant et derrière
            $nom = trim($nom);
            // pas de tags dans le nom
            $nom = strip_tags($nom);
            // on met tout en minuscule
            $nom = strtolower($nom);
            // on met la première lettre en minuscule
            $nom = ucfirst($nom);

            // si chaîne vide
            if($nom==="")
                throw new Exception("Pas de nom vide !");

            // si la chaîne est plus petite que 3 caractères
            if(strlen($nom)<=3)
                throw new Exception("Nom trop petit <=3");

            // si la chaîne est plus longue que 20 caractère
            if(strlen($nom)>20)
                throw new Exception("Nom trop long >20");

            // La chaîne doit commencer par une lettre en majuscule, suivie par des lettres en minuscules
            if (!preg_match('/^\p{Lu}\p{Ll}*$/u', $nom))
                throw new Exception("Le nom doit commencer par une majuscule et continuer avec des caractère en miniscule");


                // $this représente l'instance de la classe (objet)
                $this->le_nom = $nom;

        }

        function setLePrenom(string $prenom){
            // pas d'espaces vides devant et derrière
            $prenom = trim($prenom);
            // pas de tags dans le nom
            $prenom = strip_tags($prenom);
            // on met tout en minuscule
            $prenom = strtolower($prenom);
            // on met la première lettre en minuscule
            $prenom = ucfirst($prenom);

            // si chaîne vide
            if($prenom==="")
                throw new Exception("Pas de Prénom vide !");

            // si la chaîne est plus petite que 3 caractères
            if(strlen($prenom)<=3)
                throw new Exception("Prénom trop petit <=3");

            // si la chaîne est plus longue que 20 caractère
            if(strlen($prenom)>20)
                throw new Exception("Prénom trop long >20");

            // La chaîne doit commencer par une lettre en majuscule, suivie par des lettres en minuscules
            if (!preg_match('/^\p{Lu}\p{Ll}*$/u', $prenom))
                throw new Exception("Le Prénom doit commencer par une majuscule et continuer avec des caractère en miniscule");


            // $this représente l'instance de la classe (objet)
            $this->le_prenom = $prenom;
        }

        // méthodes getters (permettent de récupérer la valeur d'une propriété

        public function getLeNom(): ?string
        {
            return $this->le_nom;
        }
        public function getLePrenom(): ?string
        {
            return $this->le_prenom;
        }


        // méthode statique, peut être appelée sans instanciation ::
        public static function getUp():string{
            return "aurevoir";
        }

}