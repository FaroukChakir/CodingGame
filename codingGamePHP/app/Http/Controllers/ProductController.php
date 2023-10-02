<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryProductRepository;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $categoryProductRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        CategoryProductRepository $categoryProductRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryProductRepository = $categoryProductRepository;
    }

    public function getProducts(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $products = $this->productRepository->paginate($perPage);
        return response()->json($products);
    }

    public function searchProductsByCategory(Request $request)
    {
        $categoryName = $request->input('category');

        if (!$categoryName) {
            return $this->getProducts($request);
        }

        $category = $this->categoryRepository->getByName($categoryName);

        if (!$category) {
            return response()->json(['message' => 'No category found', 'data' => []]);
        }

        $productIds = $this->categoryProductRepository->getProductIdsByCategory($category->id);

        if (empty($productIds)) {
            return response()->json(['message' => 'No products found for this category', 'data' => []]);
        }

        $products = $this->productRepository->getProductsByIds($productIds);

        return response()->json(['data' => $products]);
    }
}
