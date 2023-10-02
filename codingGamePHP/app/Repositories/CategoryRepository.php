<?php 

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
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
        $category = $this->model->find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }

    public function getByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}
