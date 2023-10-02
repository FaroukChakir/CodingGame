<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\CategoryProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class CreateCategoryProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category_product:create {Product_id} {Category_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        CategoryProductRepository $categoryProductRepository
    ) {
        $productId = $this->argument('Product_id');
        $categoryId = $this->argument('Category_id');
        
        $product = $productRepository->getById($productId);
        $category = $categoryRepository->getById($categoryId);

        if (!$product) {
            $this->error('Product does not exist');
            return;
        }
        
        if (!$category) {
            $this->error('Category does not exist');
            return;
        }

        $categoryProductData = [
            'category_id' => $categoryId,
            'product_id' => $productId,
        ];

        $categoryProduct = $categoryProductRepository->create($categoryProductData);

        if ($categoryProduct) {
            $this->info("Product was associated with the category successfully.");
        } else {
            $this->error('Failed to create the category product.');
        }
    }
}
