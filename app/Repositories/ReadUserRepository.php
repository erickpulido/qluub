<?php

namespace App\Repositories;

use App\Interfaces\ReadUserRepositoryInterface;
use App\Models\User;

class ReadUserRepository implements ReadUserRepositoryInterface
{
    public function index()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }
}
