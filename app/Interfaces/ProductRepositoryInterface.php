<?php

namespace App\Interfaces;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all(): iterable;
    public function create(array $data): Product;
    public function getById($id): ?Product;
    public function update(Product $product, array $data): Product;
    public function delete($id): bool;
}
