<?php

namespace App\Repositories;

use App\Interfaces\WriteUserRepositoryInterface;
use App\Models\User;

class WriteUserRepository implements WriteUserRepositoryInterface
{
    public function store($data)
    {
        return User::create($data);
    }
}
