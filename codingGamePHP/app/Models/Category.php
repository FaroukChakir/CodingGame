<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product')
            ->using(CategoryProduct::class)
            ->withTimestamps();
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}