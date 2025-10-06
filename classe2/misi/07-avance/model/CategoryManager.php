<?php
// création du namespace
namespace model;

use PDO;
use SlugifyTrait;

class CategoryManager implements ManagerInterface, CrudInterface
{


    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    public function create(array $data): bool
    {
        if (isset($data['name'])) {
            $data['slug'] = $this->slugify($data['name']);
        }

    }

}

