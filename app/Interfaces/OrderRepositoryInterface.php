<?php

namespace App\Interfaces;
use App\Models\order;

interface OrderRepositoryInterface
{
    public function all(array $relations = []): iterable;
    public function create(array $data): Order;
    public function getById($id, array $relations = []): ?Order;
    public function update(Order $Order, array $data): Order;
    public function delete($id): bool;
}
