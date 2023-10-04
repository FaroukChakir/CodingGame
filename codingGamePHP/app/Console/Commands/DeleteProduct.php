<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;

class DeleteProduct extends Command
{
    protected $signature = 'product:delete {product_id}';
    protected $description = 'Delete a product';

    protected $productService; 

    public function __construct(ProductService $productService) // im using this to inject my service
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function handle()
    {
        $productId = $this->argument('product_id');

        $result = $this->productService->deleteProduct($productId); 

        if ($result) {
            $this->info("Product with ID $productId deleted successfully.");
        } else {
            $this->error("Product with ID $productId not found.");
        }
    }
}
