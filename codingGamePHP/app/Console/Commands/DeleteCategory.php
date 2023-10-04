<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryService;

class DeleteCategory extends Command
{
    protected $signature = 'category:delete {category_id}';
    protected $description = 'Delete a category';

    protected $categoryService; 

    public function __construct(CategoryService $categoryService) 
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle()
    {
        $categoryId = $this->argument('category_id');

        $result = $this->categoryService->deleteCategory($categoryId);

        if ($result) {
            $this->info("Category with ID $categoryId deleted successfully.");
        } else {
            $this->error("Category with ID $categoryId not found.");
        }
    }
}
