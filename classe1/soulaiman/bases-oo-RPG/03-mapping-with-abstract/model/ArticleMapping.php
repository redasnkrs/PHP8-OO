<?php
 
class   ArticleMapping
{
    protected ?int $id = null;
    protected ?string $article_title = null;
    protected ?string $article_slug = null;
    protected ?string $article_text = null;
    protected ?string $article_date = null;
    protected ?string $article_visibility = null;
 
 
    public function __construct(){
        echo __CLASS__. "instancié";
    }
     public function getId(): ?int
 {
     return $this->id;
 }  
    public function setId(?int $id): void
    {
        $this->id = $id;
        
    }
    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }
    public function setArticleTitle(string $article_title): void
    {
        $this->article_title = $article_title;
     
    }
    public function getArticleSlug(): ?string
    {
        return $this->article_slug;
    }
    public function setArticleSlug(string $article_slug): void
    {
        $this->article_slug = $article_slug;
    
    }
    public function getArticleText(): ?string
    {
        return $this->article_text;
    }
    public function setArticleText(string $article_text): void
    {
        $this->article_text = $article_text;
        
    }
    public function getArticleDate(): ?string
    {
        return $this->article_date;
    }
    public function setArticleDate(string $article_date): void
    {
        $this->article_date = $article_date;
       
    }
    public function getArticleVisibility(): ?string
    {
        return $this->article_visibility;
    }
    public function setArticleVisibility(string $article_visibility): void
    {
        $this->article_visibility = $article_visibility;
       
    }

}
 