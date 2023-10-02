<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        $product = $this->model->find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }

    public function getProductsByIds(array $productIds)
    {
        return $this->model->whereIn('id', $productIds)->get();
    }
    /// im using this to paginate as to bring data 10 by 10
    
    public function paginate($perPage)
    {
        return $this->model->paginate($perPage);
    }
}
