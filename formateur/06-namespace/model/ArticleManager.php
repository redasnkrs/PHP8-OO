<?php
// création du namespace
namespace model;

use PDO;
use Exception;

// implémentation de 2 interfaces
class ArticleManager implements ManagerInterface, CrudInterface
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
        $sql = "INSERT INTO `article` (`article_title`, `article_slug`, `article_text`, `article_visibility`) VALUES (?,?,?,?)";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([
                $data->getArticleTitle(),
                $data->getArticleSlug(),
                $data->getArticleText(),
                $data->getArticleVisibility()
            ]);
            return true;
        }catch (Exception $e){
            return $e->getMessage();
        }

    }

    public function readById(int $id): bool|AbstractMapping
    {
        return false;
    }

    // récupération de tous nos articles
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }

    public function update(int $id, AbstractMapping $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    /*
     * Nos méthodes n'existant pas dans l'interface
     */

    // on souhaite ne récupérer que les articles visibles
    // pour la page d'accueil
    public function readAllVisible(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` WHERE `article_visibility`=1 ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }
}