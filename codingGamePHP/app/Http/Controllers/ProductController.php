<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
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

    public function getProducts()
    {
        $request = ServerRequest::fromGlobals();

        $perPage = $request->getQueryParams()['per_page'] ?? 10;
        $products = $this->productRepository->paginate($perPage);
        $productsJson = json_encode($products);

        $response = new Response(200, ['Content-Type' => 'application/json'], $productsJson);

        return $response;
    }

    public function searchProductsByCategory($category)
    {

        $request = new ServerRequest('GET', '/path-to-search?category=' . $category);

        $categoryName = $request->getQueryParams()['category'];

        if (!$categoryName) {
            return new Response(400, ['Content-Type' => 'application/json'], json_encode(['message' => 'Missing category parameter']));
        }

        $category = $this->categoryRepository->getByName($categoryName);

        if (!$category) {
            return new Response(404, ['Content-Type' => 'application/json'], json_encode(['message' => 'No category found']));
        }

        $productIds = $this->categoryProductRepository->getProductIdsByCategory($category->id);

        if (empty($productIds)) {
            return new Response(404, ['Content-Type' => 'application/json'], json_encode(['message' => 'No products found for this category']));
        }

        $products = $this->productRepository->getProductsByIds($productIds);
        $productsJson = json_encode($products);
        
        $response = new Response(200, ['Content-Type' => 'application/json'], $productsJson);

        return $response;
    }
}
