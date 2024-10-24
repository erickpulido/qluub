<?php

namespace App\Repositories;

use App\Interfaces\ReadProductRepositoryInterface;
use App\Models\Product;

class ReadProductRepository implements ReadProductRepositoryInterface
{
    public function index()
    {
        return Product::all();
    }

    public function getById($id)
    {
       return Product::findOrFail($id);
    }
}
