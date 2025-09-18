<?php
 
class   ArticleMapping
{
   // propriétés = champs de la table
    protected ?int $id=null; // entier positif
    protected ?string $article_title=null; // string de 120 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_slug=null; // string de 125 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_text=null; // minimum 20 caractères, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_date=null; // doit être une date valide si remplie sinon erreur
    protected null|bool|int $article_visibility=null; // si int convertir en bool, si bool, attribuer la valeur

 
 
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
               
          if(is_null($this)) return;
          $article_title = trim(htmlspecialchars(strip_tags($article_title)));
          if(empty($article_title)) {
              throw new Exception("Le titre de l'article est vide");
          }
            if(strlen($article_title) < 6) {
                throw new Exception("Le titre de l'article est trop court (minimum 6 caractères)");
            }
            if(strlen($article_title) > 120) {
                throw new Exception("Le titre de l'article est trop long (maximum 120 caractères)");
            }


        $this->article_title = $article_title;
     
    }
    public function getArticleSlug(): ?string
    {
        return $this->article_slug;
    }
    public function setArticleSlug(string $article_slug): void
    {
        if(is_null($this)) return;
        $article_slug = trim(htmlspecialchars(strip_tags($article_slug)));
        if(empty($article_slug)) {
            throw new Exception("Le slug de l'article est vide");
        }
          if(strlen($article_slug) < 6) {
              throw new Exception("Le slug de l'article est trop court (minimum 6 caractères)");
          }
          if(strlen($article_slug) > 125) {
              throw new Exception("Le slug de l'article est trop long (maximum 125 caractères)");
          }
        $this->article_slug = $article_slug;
    
    }
    public function getArticleText(): ?string
    {
        return $this->article_text;
    }
    public function setArticleText(string $article_text): void

    {
        if(is_null($this)) return;
        $article_text = trim(htmlspecialchars(strip_tags($article_text)));
        if(empty($article_text)) {
            throw new Exception("Le texte de l'article est vide");
        }
          if(strlen($article_text) < 20) {
              throw new Exception("Le texte de l'article est trop court (minimum 20 caractères)");
          }

        $this->article_text = $article_text;
        
    }
    public function getArticleDate(): ?string
    {
        return $this->article_date;
    }
    public function setArticleDate(string $article_date): void
    {
        if(is_null($this)) return;
        $article_date = trim(htmlspecialchars(strip_tags($article_date)));
        if(!empty($article_date) && !strtotime($article_date)) {
            throw new Exception("La date de l'article n'est pas valide");
        }

        $this->article_date = $article_date;
       
    }
    public function getArticleVisibility(): ?string
    {
        return $this->article_visibility;
    }
    public function setArticleVisibility(string $article_visibility): void
    {

        if(is_null($this)) return;
        if(is_int($article_visibility)) {
            $article_visibility = (bool)$article_visibility;
        }   
        if(!is_bool($article_visibility)) {
            throw new Exception("La visibilité de l'article n'est pas valide");
        }
        
        $this->article_visibility = $article_visibility;
       
    }

}
 