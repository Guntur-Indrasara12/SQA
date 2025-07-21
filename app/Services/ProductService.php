<?php

namespace App\Services;

use App\Exceptions\product\ProductNotFoundException;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getAllProducts()
    {
        return Cache::remember('products.all', now()->addMinutes(30), function () {
            return $this->repo->all();
        });
    }

    public function getFilteredProducts(Request $request)
    {
        return $this->repo->filter($request);
    }
    public function create(array $data): Product
    {
        Cache::forget('products.all');
        return $this->repo->create($data);
    }

    public function getProductById($id): ?Product
    {
        $product = $this->repo->getById($id);
        if (!$product) {
            throw new ProductNotFoundException();
        }
        return $product;
    }

    public function update(Product $product, array $data): Product
    {
        Cache::forget('products.all');
        return $this->repo->update($product, $data);
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new ProductNotFoundException();
        }
        Cache::forget('products.all');
        return true;
    }
}
