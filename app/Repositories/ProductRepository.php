<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(): iterable
    {
        return Product::all();
    }

    public function filter(Request $request): iterable
    {
        return Product::applyFilters($request, ['name', 'status', 'price'])
            ->paginate($request->input('per_page', 5));
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function getById($id): ?Product
    {
        return Product::find($id);
    }
    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }
    public function delete($id): bool
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
}
