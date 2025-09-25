<?php

class ArticleManager implements ManagerInterface, CrudInterface
{
    private $db;
    public function __construct(PDO $connect)
    {
        $this->db = $connect;
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


    public function readById(int $id)
    {
        // TODO: Implement readById() method.
    }

    public function readAll()
    {
        // TODO: Implement readAll() method.
    }
}