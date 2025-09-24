<?php

class ArticleManager implements ManagerInterface, CrudInterface
{
    private $db;
    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}