<?php
class LaVoiture
{
    // propriétés
    private ?string $marque = null;
    private ?int $annee_sortie = null;
    private ?int $chevaux = null;
    private ?string $model = null;

    // constantes ! typage autorisé depuis 8.3
    public const  VOITURE_NEUVE = true; // par défaut public
    private const  MOTORISATION = "Essence";
    // Méthodes
    public const NOS_MARQUES =
        [
            'Mercedes',
            'Volvo',
            'BMW',
            'Fiat',
        ];

    /* Le constructeur est une méthode publique
    magique qui est appelée lors de l'instanciation
    de la classe dans laquelle il se trouve (new)
    */
    public function __construct(string $laMarque, int $year, int $chevaux, string $model)
    {
        // utilisation des setters pour protéger
        // les entrées lors de la création de l'instance
        $this->setMarque($laMarque);
        $this->setAnneeSortie($year);
        $this->setChevaux($chevaux);
        $this->setModel($model);

    }

    // getter

    // getMarque pour récupérer la marque
    public function getMarque(): ?string
    {
        return $this->marque;
    }

    // setters setMarque pour modifier la marque
    // ne peut être vide, protection trim()- strip_tags
    // htmlspecialchars
    // EXE : ne peut être plus petit que 3
    // EXE : ne peut être plus grand que 20
    public function setMarque(?string $laMarque): void
    {
        $theMarque = trim(strip_tags($laMarque));
        $theMarque = htmlspecialchars($theMarque, ENT_QUOTES);
        if (in_array($theMarque, self::NOS_MARQUES, true)) {
            if (strlen($theMarque) >= 3 && strlen($theMarque) <= 20) {
                $this->marque = $theMarque;
            } else {
                trigger_error("La marque doit faire entre 3 et 20 caractères");
            }
        } else {
            trigger_error("La marque n'est pas dans la liste autorisée");
        }

    }

    // getter getAnneeSortie()
    public function getAnneeSortie()
    {
        return $this->annee_sortie;
    }


  // entier positif
  // EXE supérieur 1800
  // EXE inférieur à l'année actuelle
  // setter setAnneeSortie()
  public function setAnneeSortie(?int $annee): void
    {
        $aneeActuelle = (int)date("Y");
        if($annee > 1800 && $annee <= $aneeActuelle){
            $this->annee_sortie = $annee;
        }else{
            trigger_error("L'année doit être comprise entre 1800 et l'année actuelle");
        }
    }


    // EXE idem pour les $chevaux
    // EXE minimum 50 maximum 1000
  public function getChevaux(): ?int
  {
      return $this->chevaux;
  }

  public function setChevaux(?int $chevaux): void {
      if($chevaux >= 50 && $chevaux <= 1000){
          $this->chevaux = $chevaux;
      }else{
          trigger_error("Le nombre de chevaux doit être compris entre 50 et 1000");
      }
  }


    // EXE model idem que pour la marque

  public function getModel(): ?string {
      return $this->model;
  }

  public function setModel(?string $model): void {
      $theModel = trim(strip_tags($model));
      $theModel = htmlspecialchars($theModel, ENT_QUOTES);
      if($theModel !== ""){
          if(strlen($theModel) >= 3 && strlen($theModel) <= 30){
              $this->model = $theModel;
          }else{
              trigger_error("Le modèle doit faire entre 3 et 30 caractères");
          }
      }else{
          trigger_error("Le modèle ne peut pas être vide");
      }
    }

    // BONUS EXE
    // CHANGER le setter de LaMarque pour qu'il n'accepte
    // que les marques dans le tableau self::NOS_MARQUES


}