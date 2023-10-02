<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Repositories\ProductRepository;

class DeleteProduct extends Command
{
    protected $signature = 'product:delete {product_id}';
    protected $description = 'Delete a product';

    public function handle(ProductRepository $productRepository)
    {
        $productId = $this->argument('product_id');

        $result = $productRepository->delete($productId);

        if ($result) {
            $this->info("Product with ID $productId deleted successfully.");
        } else {
            $this->error("Product with ID $productId not found.");
        }
    }
}
