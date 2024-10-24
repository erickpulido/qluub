<?php

namespace App\Interfaces;

interface WriteProductRepositoryInterface
{
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
