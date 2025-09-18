<?php

class ArticleMapping{
    protected ?int $id = null;
    protected ?string $article_title = null;
    protected ?string $raticle_text =null;
    protected ?string $article_date = null;
    protected null|bool|int $article_visibility = null;

    public function __construct(){
        echo __CLASS__." instanciée";
        
    }
        
    
}