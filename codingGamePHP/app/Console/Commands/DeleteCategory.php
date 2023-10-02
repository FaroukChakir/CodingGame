<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class DeleteCategory extends Command
{
    protected $signature = 'category:delete {category_id}';
    protected $description = 'Delete a category';

    public function handle(CategoryRepository $categoryRepository)
    {
        $categoryId = $this->argument('category_id');
        $result = $categoryRepository->delete($categoryId);
    
        if ($result) {
            $this->info("Category with ID $categoryId deleted successfully.");
        } else {
            $this->error("Category with ID $categoryId not found.");
        }
    }
}
