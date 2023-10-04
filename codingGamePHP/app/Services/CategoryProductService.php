<?php 

namespace App\Services;

use App\Repositories\categoryproductRepository;

class CategoryProductService
{
    protected $categoryproductRepository;

    public function __construct(categoryproductRepository $categoryproductRepository)
    {
        $this->categoryproductRepository = $categoryproductRepository;
    }

    public function createCategoryProduct(array $data)
    {
        return $this->categoryproductRepository->create($data);
    }

    public function deleteCategoryProduct($categoryproductId)
    {
        return $this->categoryproductRepository->delete($categoryproductId);
    }
}
