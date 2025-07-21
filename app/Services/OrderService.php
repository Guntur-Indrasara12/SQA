<?php

namespace App\Services;

use App\Exceptions\Order\OrderNotFoundException;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use App\Services\ProductService;
use App\Events\OrderCreated;

class OrderService
{
    protected $repo;
    protected $productService;

    public function __construct(OrderRepositoryInterface $repo, ProductService $productService)
    {
        $this->repo = $repo;
        $this->productService = $productService;
    }


    public function getAllOrders()
    {
        return $this->repo->all(['product']);
    }

    public function calculateTotal(int $quantity, float $price): float
    {
        return $quantity * $price;
    }

    public function create(array $data): Order
    {
        $product = $this->productService->getProductById($data['product_id']);
        $price = $product->price;
        $data['total'] = $this->calculateTotal($data['quantity'], $price);
        $order = $this->repo->create($data);
        event(new OrderCreated($order)); // sync event
        return $order;
    }


    public function getOrderById($id): ?Order
    {
        $Order = $this->repo->getById($id, ['product']);
        if (!$Order) {
            throw new OrderNotFoundException();
        }
        return $Order;
    }

    public function update(Order $Order, array $data): Order
    {
        $product = $this->productService->getProductById($data['product_id']);
        $price = $product->price;
        $data['total'] = $this->calculateTotal($data['quantity'], $price);
        return $this->repo->update($Order, $data);
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new OrderNotFoundException();
        }
        return true;
    }
}
