<?php

interface CrudInterface
{
    public function create(AbstractMapping $data);
    public function readById(int $id);
    public function readAll();
    public function update(int $id, AbstractMapping $data);
    public function delete(int $id);
}