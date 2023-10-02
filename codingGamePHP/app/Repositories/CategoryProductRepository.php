<?php

namespace App\Repositories;

use App\Models\CategoryProduct;

class CategoryProductRepository
{
    protected $model;

    public function __construct(CategoryProduct $categoryProduct)
    {
        $this->model = $categoryProduct;
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
        $categoryProduct = $this->model->find($id);
        if ($categoryProduct) {
            $categoryProduct->delete();
            return true;
        }
        return false;
    }

    public function getProductIdsByCategory($categoryId)
    {
        return $this->model->where('category_id', $categoryId)->pluck('product_id')->toArray();
    }
}
