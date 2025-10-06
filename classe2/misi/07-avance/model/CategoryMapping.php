<?php

class CategoryMapping extends AbstractMapping{
    // propriétés = champs de la table
    protected ?int $id=null; // entier positif
    protected ?string $article_title=null; // string de 120 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_slug=null; // string de 125 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_text=null; // minimum 20 caractères, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_date=null; // doit être une date valide si remplie sinon erreur
    protected null|bool|int $article_visibility=null; // si int convertir en bool, si bool, attribuer la valeur
    protected ?array $category=[]; // contiendra les catégories de l'article actuel

    // méthodes



    // constructeur et hydratation dans AbstractMapping


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

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    // string de 120 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    public function setArticleTitle(?string $title): void
    {
        if(is_null($title)) return;
        $titleClean = trim(htmlspecialchars(strip_tags($title)));
        if(empty($titleClean))
            throw new Exception("Le titre ne peut être vide !");
        if(strlen($titleClean)<6)
            throw new Exception("Le titre est trop court !");
        if(strlen($titleClean)>120)
            throw new Exception("Le titre est trop long !");

        $this->article_title = $titleClean;
    }

    public function getArticleSlug(): ?string
    {
        return $this->article_slug;
    }

} 