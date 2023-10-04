<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryProductService;

class CreateCategoryProduct extends Command
{
    protected $signature = 'categoryproduct:create {Product_id} {Category_id}';
    protected $description = 'Create a new category product';

    protected $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        parent::__construct();
        $this->categoryProductService = $categoryProductService;
    }

    public function handle()
    {
        $productId = $this->argument('Product_id');
        $categoryId = $this->argument('Category_id');
        
        $result = $this->categoryProductService->createCategoryProduct([
            'product_id' => $productId,
            'category_id' => $categoryId,
        ]);

        if ($result) {
            $this->info("Product was associated with the category successfully.");
        } else {
            $this->error('Failed to create the category product.');
        }
    }
}
