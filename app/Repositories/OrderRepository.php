<?php

namespace App\Repositories;

use App\Models\Order;
use App\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function all(array $relations = []): iterable
    {
        return Order::with($relations)->get();
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function getById($id, array $relations = []): ?Order
    {
        return Order::with($relations)->find($id);
    }

    public function update(Order $Order, array $data): Order
    {
        $Order->update($data);
        return $Order;
    }
    public function delete($id): bool
    {
        $Order = Order::find($id);
        if ($Order) {
            return $Order->delete();
        }
        return false;
    }
}
