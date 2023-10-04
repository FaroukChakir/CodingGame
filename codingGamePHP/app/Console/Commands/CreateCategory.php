<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryService;

class CreateCategory extends Command
{
    protected $signature = 'category:create {name} {parent_id?}';
    protected $description = 'Create a new category';

    protected $categoryService; 

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $parentId = $this->argument('parent_id');

        /************************************************ */
        // Check if the parent_id exists before inserting
        /************************************************ */
        if ($parentId !== null) {
            $parentCategory = $this->categoryService->getCategoryById($parentId); 

            if (!$parentCategory) {
                $this->error("Parent category with ID $parentId does not exist.");
                return;
            }

            if ($parentCategory->id === $parentId) {
                $this->error("A category cannot be its own parent.");
                return;
            }
        }

        /************************************************ */
        // Create the category using CategoryService
        /************************************************ */

        $categoryData = [
            'name' => $name,
            'parent_id' => $parentId,
        ];

        $category = $this->categoryService->createCategory($categoryData); 

        if ($category) {
            $message = "Category '$name' created successfully.";
            if ($parentId !== null) {
                $parentName = $this->categoryService->getCategoryById($parentId)->name;
                $message .= " Parent ID: $parentName";
            }
            $this->info($message);
        } else {
            $this->error('Failed to create the category.');
        }
    }
}
