<?php

class ArticleMapping{
    // propriétés = champs de la table
    protected ?int $id=null; // entier positif
    protected ?string $article_title=null; // string de 120 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_slug=null; // string de 125 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_text=null; // minimum 20 caractères, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_date=null; // doit être une date valide si remplie sinon erreur
    protected null|bool|int $article_visibility=null; // si int convertir en bool, si bool, attribuer la valeur

    // méthodes

    // constructeur
    public function __construct(){
        // exemple de texte prouvant l'instanciation
        echo __CLASS__." instanciée";
    }

    // getters et setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id):void
    {
        if(is_null($id)) return;
        if($id<=0)
            throw new Exception("L'id doit être positif");
        $this->id = $id;
    }


}