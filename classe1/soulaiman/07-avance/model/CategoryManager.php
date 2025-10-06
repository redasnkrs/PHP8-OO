<?php
// création du namespace
namespace model;

use PDO;
use Exception;

// implémentation de 2 interfaces
class CategoryManager  implements ManagerInterface, CrudInterface
{
    private PDO $db;


    // implémenté à cause de MangerInterface
    public function __construct(PDO $connect){
        $this->db = $connect;
    }

    // Appel du Trait pour slugifier le titre
    use SlugifyTrait;

    /*
     * méthodes implémentées à cause de CrudInterface
     * AbstractMapping est le parent de tous nos
     * mapping, c'est-à-dire données où on applique un CRUD
     * dans notre cas une bdd MySQL
     */
    public function create(AbstractMapping $data): bool|string
    {
        $sql = "INSERT INTO `category` (`category_name`, `category_slug`, `category_desc`) VALUES (?,?,?)";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([
                $data->getCategoryName(),
                $data->getCategorySlug(),
                $data->getCategoryDesc()
                
            ]);
            return true;
        }catch (Exception $e){
            return $e->getMessage();
        }

    }

    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM `category` WHERE `id` = ?";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(1,$id,PDO::PARAM_INT);
        try{
            $prepare->execute();
            // si pas d'article récupéré
            if($prepare->rowCount()!==1)
                return false;
            // on a un article
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
            // création de l'instance de type ArticleMapping
            $category = new CategoryMapping($result);
            $prepare->closeCursor();
            return $category;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    // récupération de tous nos articles
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `category` ";
        if($orderDesc)
            $sql .= " ORDER BY `id` DESC";
        else
            $sql .= " ORDER BY `id` ASC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = [];
        foreach ($stmt as $item){
            // réutilisation des setters
            $results[] = new CategoryMapping($item);
        }
        $query->closeCursor();
        return $results ;
    }

    public function update(int $id, AbstractMapping $data): bool|string
    {
        // on vérifie que l'id ($id = get et $data->getId() vient du POST) de l'article n'a pas été modifié par l'utilisateur
        if ($id != $data->getId())
            return "Pas bien de toucher à l'id !";
        // on peut faire l'update
        $sql = "UPDATE `category` SET 
                     `category_name`= :nom,
                     `category_slug`= :slug,
                     `category_desc`= :desc
    
                WHERE `id` = :id;      
                     ";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue("id", $data->getId(), PDO::PARAM_INT);
        $prepare->bindValue("nom", $data->getCategoryName());
        $prepare->bindValue("slug", $data->getCategorySlug());
        $prepare->bindValue("desc", $data->getCategoryDesc());
       
        try{
            $prepare->execute();
            return true;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }



    public function delete(int $id)
    {
        $sql = "DELETE FROM `category` WHERE `id`=?";
        $prepare = $this->db->prepare($sql);
        try{
            $prepare->execute([$id]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    

   
}