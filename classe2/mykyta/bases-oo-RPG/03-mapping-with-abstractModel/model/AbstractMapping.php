<?php

class ArticleMapping{
    protected ?int $id = null; //entier positif
    protected ?string $article_title = null;    // string de 120 max et 6 minimum, sans tags, sans espaces au début et à la fin
    protected ?string $article_slug = null;     // string de 125 max et 
    protected ?string $article_text =null;      //string (texte long)
    protected ?string $article_date = null;     //doit etre une date valide si remplie sinon erreur
    protected null|bool|int $article_visibility = null; //bool ou 0/1

    public function __construct(){
        echo __CLASS__." instanciée";

    }
    
    public function getId(): ?int {
        return $this->id;
    }public function setId(?int $id): void {
        if (is_null($id)) return;
        if ($id <= 0) {
            throw new Exception("L'id doit être un entier positif");
        }
        $this->id = $id;   
    }
}