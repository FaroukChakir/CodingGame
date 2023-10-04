<?php 

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategorytService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function createProduct(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function deleteProduct($categoryId)
    {
        return $this->categoryRepository->delete($categoryId);
    }

}
