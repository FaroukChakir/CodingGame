<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService; 

class CreateProduct extends Command
{
    protected $signature = 'product:create {name} {description} {price} {image}';
    protected $description = 'Create a new product';

    protected $productService; 

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');
        $imagePath = $this->argument('image');

        /************************************/
        /* Validate price input */
        /************************************/
        if (!is_numeric($price) || $price <= 0) {
            $this->error('Invalid price. Price must be a positive number.');
            return;
        }

        /************************************/
        /* Create the Product using ProductService */
        /************************************/

        $productData = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $imagePath,
        ];

        $product = $this->productService->createProduct($productData);

        if ($product) {
            $this->info("Product '$name' created successfully.");
        } else {
            $this->error('Failed to create the product.');
        }
    }
}
