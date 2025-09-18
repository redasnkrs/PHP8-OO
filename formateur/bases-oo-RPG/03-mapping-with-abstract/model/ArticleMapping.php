<?php

class ArticleMapping{
    // propriétés = champs de la table
    protected ?int $id=null;
    protected ?string $article_title=null;
    protected ?string $article_slug=null;
    protected ?string $article_text=null;
    protected ?string $article_date=null;
    protected null|bool|int $article_visibility=null;

    // méthodes

    // constructeur
    public function __construct(){
        // exemple de texte prouvant l'instanciation
        echo __CLASS__." instanciée";
    }

    // getters et setters


}