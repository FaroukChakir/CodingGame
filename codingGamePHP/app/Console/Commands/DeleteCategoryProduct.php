<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryProductService;

class DeleteCategoryProduct extends Command
{
    protected $signature = 'category_product:delete {category_product_id}';
    protected $description = 'Delete a category product';

    protected $categoryProductService;
    public function __construct(CategoryProductService $categoryProductService)
    {
        parent::__construct();
        $this->categoryProductService = $categoryProductService;
    }

    public function handle()
    {
        $categoryProductId = $this->argument('category_product_id');

        $result = $this->categoryProductService->deleteCategoryProduct($categoryProductId);

        if ($result) {
            $this->info("CategoryProduct with ID $categoryProductId deleted successfully.");
        } else {
            $this->error("CategoryProduct with ID $categoryProductId not found.");
        }
    }
}
