<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\Category;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateCategory()
    {
        Artisan::call('category:create', [
            'name' => 'TestCategory',
        ]);
        $category = Category::where('name', 'TestCategory')->first();
        $this->assertNotNull($category);
    }

    public function testCreateCategoryWithParent()
    { 
        $parentCategory = Category::factory()->create();
        Artisan::call('category:create', [
            'name' => 'ChildCategory',
            'parent_id' => $parentCategory->id,
        ]);
        $childCategory = Category::where('name', 'ChildCategory')->first();
        $this->assertNotNull($childCategory);
        $this->assertEquals($parentCategory->id, $childCategory->parent_id);
    }




}
