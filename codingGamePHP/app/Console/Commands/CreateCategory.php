<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use App\Repositories\CategoryRepository;

class CreateCategory extends Command
{
    protected $signature = 'category:create {name} {parent_id?}';
    protected $description = 'Create a new category';

    public function handle(CategoryRepository $categoryRepository)
    {
        $name = $this->argument('name');
        $parentId = $this->argument('parent_id');

        /************************************************ */
        // Check if the parent_id exists before inserting
        /************************************************ */
        if ($parentId !== null) {
            $parentCategory = $categoryRepository->getById($parentId);

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
        // Create the category
        /************************************************ */

        $categoryData = [
            'name' => $name,
            'parent_id' => $parentId,
        ];

        $category = $categoryRepository->create($categoryData);

        if ($category) {
            $message = "Category '$name' created successfully.";
            if ($parentId !== null) {
                $parentName = Category::find($parentId)->name;
                $message .= " Parent ID: $parentName";
            }
            $this->info($message);
        } else {
            $this->error('Failed to create the category.');
        }
    }
}
