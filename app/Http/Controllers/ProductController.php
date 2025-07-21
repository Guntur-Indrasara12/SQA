<?php

namespace App\Http\Controllers;

use App\Exceptions\product\ProductNotFoundException;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

use App\Notifications\ProductRequestedNotification;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(request $request)
    {
        // $products = $this->productService->getAllProducts();
        $products = $this->productService->getFilteredProducts($request);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');

    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->create($request->validated());
        return redirect()->route('product.index')->with('success', 'Product stored successfully');
    }
    public function edit($id)
    {
        try {
            $product = $this->productService->getProductById($id);
            return view('product.edit', compact('product'));
        } catch (ProductNotFoundException $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function update(StoreProductRequest $request, $id)
    {
        try {
            $product = $this->productService->getProductById($id);
            $this->productService->update($product, $request->validated());
            return redirect()->route('product.index')->with('update', 'Product updated successfully');
        } catch (ProductNotFoundException $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $product = $this->productService->getProductById($id);
            return view('product.show', compact('product'));
        } catch (ProductNotFoundException $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

}
