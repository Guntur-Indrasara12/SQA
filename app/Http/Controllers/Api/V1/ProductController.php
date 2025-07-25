<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $products = $this->service->getAllProducts();
        return ProductResource::collection($products);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->service->create($request->validated());
        return new ProductResource($product);
    }

    public function show($id)
    {
        $product = $this->service->getProductById($id);
        return new ProductResource($product);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $product = $this->service->getProductById($id);
        $updated = $this->service->update($product, $request->validated());
        return new ProductResource($updated);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
