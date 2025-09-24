<?php

interface CrudInterface
{
    public function create(AbstractMapping $data);
    public function read(int $id);
    public function update(int $id, AbstractMapping $data);
    public function delete(int $id);
}