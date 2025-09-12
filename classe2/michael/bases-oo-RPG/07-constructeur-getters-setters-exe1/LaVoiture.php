<?php
class LaVoiture
{
    // propriétés
    private ?string $marque = null;
    private ?int $annee_sortie = null;
    private ?int $chevaux = null;
    private ?string $model = null;

    // constantes ! typage autorisé depuis 8.3
    public const bool VOITURE_NEUVE = true; // par défaut public
    private const string MOTORISATION = "Essence";
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
        $this->setModel($model);
        $this->setAnneeSortie($year);

    }

    // getter

    // getMarque pour récupérer la marque
    public function getMarque(): ?string
    {
        return $this->marque;
    }

    //CHANGER le setter de LaMarque pour qu'il n'accepte
    //que les marques dans le tableau self::NOS_MARQUES
    public function setMarque(?string $laMarque): void
    {
        // si la marque est dans le tableau accepté
        if(in_array($laMarque,self::NOS_MARQUES)){
            $this->marque=$laMarque;
        }else{
            trigger_error("Instance numéro : ".spl_object_id($this)." Cette marque n'est pas acceptée !");
        }

    }

    // getter getAnneeSortie()
    public function getAnneeSortie(): ?int
    {
        return $this->annee_sortie;
    }

    // setter setAnneeSortie()
    // entier positif
    // EXE supérieur 1800
    // EXE inférieur à l'année actuelle
    /**
     * @param int|null $annee_sortie
     */
    public function setAnneeSortie(?int $annee_sortie): void
    {
        if($annee_sortie<1800){
            trigger_error("Instance numéro : " . spl_object_id($this) . " Le champs ne peut dater d'avant 1800");
        }elseif($annee_sortie>date('Y')) {
            trigger_error("Instance numéro : " . spl_object_id($this) . " Le champs ne peut dater de l'avenir");

        }else {
            $this->annee_sortie = $annee_sortie;
        }
    }

    // EXE idem pour les $chevaux
    // EXE minimum 50 maximum 1000

    // EXE model idem que pour le modèle
    // setters setModel pour modifier le modèle
    // ne peut être vide, protection trim()- strip_tags
    // htmlspecialchars
    // EXE : ne peut être plus petit que 3
    // EXE : ne peut être plus grand que 20
    public function setModel(?string $model): void
    {
        // protection des champs
        $model = htmlspecialchars(strip_tags(trim($model)));
        // si vide
        if($model==="") {
            trigger_error("Instance numéro : " . spl_object_id($this) . " Le champs ne peut être vide");
        }elseif(strlen($model)<3){
            trigger_error("Instance numéro : " . spl_object_id($this) . " Le champs doit êtr plus grand ou égal à 3");
        }elseif(strlen($model)>20){
            trigger_error("Instance numéro : " . spl_object_id($this) . " Le champs doit êtr plus petit que 20");
        }else{
            $this->model=$model;
        }
    }

    // BONUS EXE
    // CHANGER le setter de LaMarque pour qu'il n'accepte
    // que les marques dans le tableau self::NOS_MARQUES

}