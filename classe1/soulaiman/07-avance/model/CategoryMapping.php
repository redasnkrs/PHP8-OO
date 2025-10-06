<?php
// création du namespace
namespace model;

use Exception;

class CategoryMapping extends AbstractMapping{
    // propriétés = champs de la table
    protected ?int $id=null; // entier positif
    protected ?string $category_name=null; // string de 80 max 
    protected ?string $category_slug=null; // string de 84 max 
    protected ?string $category_desc=null; // string de 300 max 

   

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

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    
    public function setCategoryName(?string $nom): void
    {
        if(is_null($nom)) return;
        $nom = trim(htmlspecialchars(strip_tags($nom)));
        if(empty($nom))
            throw new Exception("Le nom ne peut être vide !");
        if(strlen($nom)<2)
            throw new Exception("Le nom est trop court !");
        if(strlen($nom)>80)
            throw new Exception("Le nom est trop long !");

        $this->category_name = $nom;
    }

    public function getCategorySlug(): ?string
    {
        return $this->category_slug;
    }


    // string de 125 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    public function setCategorySlug(?string $category_slug): void
    {
        if(is_null($category_slug)) return;
        $category_slug = trim(htmlspecialchars(strip_tags($category_slug)));
        if(empty($category_slug))
            throw new Exception("Le slug ne peut être vide !");
        if(strlen($category_slug)<2)
            throw new Exception("Le slug est trop court !");
        if(strlen($category_slug)>84)
            throw new Exception("Le slug est trop long !");

        $this->category_slug = $category_slug;
    }

    public function getCategoryDesc(): ?string
    {
        return $this->category_desc;
    }

   
    public function setCategoryDesc(?string $category_desc): void
    {
        if(is_null($category_desc)) return;
        $category_desc = trim(htmlspecialchars(strip_tags($category_desc)));
        if(empty($category_desc))
            throw new Exception("La description ne peut être vide !");
        if(strlen($category_desc)<6)
            throw new Exception("La description est trop courte !");
        if(strlen($category_desc)>300)
            throw new Exception("La description est trop longue !");

        $this->category_desc = $category_desc;
    }

}
