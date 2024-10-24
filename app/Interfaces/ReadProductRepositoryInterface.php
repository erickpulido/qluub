<?php

namespace App\Interfaces;

interface ReadProductRepositoryInterface
{
    public function index();
    public function getById($id);
}
