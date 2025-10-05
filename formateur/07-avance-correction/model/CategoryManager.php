<?php

namespace model;

use PDO;
use Exception;

class CategoryManager implements CrudInterface, ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    // Appel du Trait pour slugifier le titre
    use SlugifyTrait;
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM category ";
        if($orderDesc) {
            $sql .= "ORDER BY category_name DESC";
        }
        try {
            $query = $this->db->query($sql);
            $result = [];
            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                $result[] = new CategoryMapping($data);
            }
            return $result;
        }catch (Exception $e){
            die($e->getMessage());
        }



    }

    public function readById(int $id): bool|AbstractMapping
    {
        // TODO: Implement readById() method.
    }

    public function create(AbstractMapping $data)
    {
        $sql = "INSERT INTO category (category_name, category_desc, category_slug) 
                VALUES (:category_name, :category_desc, :category_slug)";
        try {
            $query = $this->db->prepare($sql);
            $query->bindValue(":category_name", $data->getCategoryName());
            $query->bindValue(":category_desc", $data->getCategoryDesc());
            $query->bindValue(":category_slug", $data->getCategorySlug());
            $query->execute();
    }catch (Exception $e){
            return $e->getMessage();
        }
        return true;
    }

    public function update(int $id, AbstractMapping $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }




}