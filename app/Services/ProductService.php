<?php

namespace App\Services;

use App\Exceptions\product\ProductNotFoundException;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getAllProducts()
    {
        return $this->repo->all();
    }

    public function create(array $data): Product
    {
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
        return $this->repo->update($product, $data);
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new ProductNotFoundException();
        }
        return true;
    }
}
