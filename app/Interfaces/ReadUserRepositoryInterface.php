<?php

namespace App\Interfaces;

interface ReadUserRepositoryInterface
{
    public function index();
    public function getById($id);
}
