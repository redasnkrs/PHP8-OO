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
    public function read()
    {
        // TODO: Implement read() method.
    }

    public function readById(int $id): bool|AbstractMapping
    {
        // TODO: Implement readById() method.
    }

    public function create(AbstractMapping $data)
    {
        // TODO: Implement create() method.
    }

    public function update(int $id, AbstractMapping $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function readAll(bool $orderDesc = true): array
    {
        return [];
    }


}