<?php

namespace App\Interfaces;
use App\Models\PhoneNumber;

interface PhoneNumberRepositoryInterface
{
    public function all(array $relations = []): iterable;
    public function create(array $data): PhoneNumber;
    public function getById($id, array $relations = []): ?PhoneNumber;
    public function update(PhoneNumber $PhoneNumber, array $data): PhoneNumber;
    public function delete($id): bool;
}
