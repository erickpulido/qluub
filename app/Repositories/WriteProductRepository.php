<?php

namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\WriteProductRepositoryInterface;

class WriteProductRepository implements WriteProductRepositoryInterface
{
    public function store(array $data){
       return Product::create($data);
    }

    public function update(array $data,$id){
       return Product::whereId($id)->update($data);
    }
    
    public function delete($id){
       Product::destroy($id);
    }
}
