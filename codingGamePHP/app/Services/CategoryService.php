<?php 

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function deleteCategory($categoryId)
    {
        return $this->categoryRepository->delete($categoryId);
    }
    public function getCategoryById($categoryId)
    {
        return $this->categoryRepository->getById($categoryId);
    }

}
