<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CategoryProduct;
use App\Repositories\CategoryProductRepository;

class DeleteCategoryProduct extends Command
{
    protected $signature = 'category_product:delete {category_product_id}';
    protected $description = 'Delete a category product';

    public function handle(CategoryProductRepository $categoryProductRepository)
    {
        $categoryProductId = $this->argument('category_product_id');
        $result = $categoryProductRepository->delete($categoryProductId);
    
        if ($result) {
            $this->info("CategoryProduct with ID $categoryProductId deleted successfully.");
        } else {
            $this->error("CategoryProduct with ID $categoryProductId not found.");
        }
    }
}
