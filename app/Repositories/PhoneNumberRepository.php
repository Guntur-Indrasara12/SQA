<?php

namespace App\Repositories;

use App\Models\PhoneNumber;
use App\Interfaces\PhoneNumberRepositoryInterface;

class PhoneNumberRepository implements PhoneNumberRepositoryInterface
{
    public function all(array $relations = []): iterable
    {
        return PhoneNumber::with($relations)->get();
    }

    public function create(array $data): PhoneNumber
    {
        return PhoneNumber::create($data);
    }

    public function getById($id, array $relations = []): ?PhoneNumber
    {
        return PhoneNumber::with($relations)->find($id);
    }

    public function update(PhoneNumber $PhoneNumber, array $data): PhoneNumber
    {
        $PhoneNumber->update($data);
        return $PhoneNumber;
    }
    public function delete($id): bool
    {
        $PhoneNumber = PhoneNumber::find($id);
        if ($PhoneNumber) {
            return $PhoneNumber->delete();
        }
        return false;
    }
}
