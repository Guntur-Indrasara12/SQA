<?php

namespace App\Services;

use App\Exceptions\PhoneNumber\PhoneNumberNotFoundException;
use App\Interfaces\PhoneNumberRepositoryInterface;
use App\Models\PhoneNumber;
use App\Services\UserServices;
use App\Events\PhoneNumberCreated;

class PhoneNumberService
{
    protected $repo;
    protected $UserService;

    public function __construct(PhoneNumberRepositoryInterface $repo, UserServices $UserService)
    {
        $this->repo = $repo;
        $this->UserService = $UserService;
    }


    public function getAllPhoneNumbers()
    {
        return $this->repo->all(['user']);
    }


    public function create(array $data, int $userId): PhoneNumber
    {
        $preparedData = array_merge($data, ['user_id' => $userId]);
        $PhoneNumber = $this->repo->create($preparedData);
        event(new PhoneNumberCreated($PhoneNumber));
        return $PhoneNumber;
    }


    public function getPhoneNumberById($id): ?PhoneNumber
    {
        $PhoneNumber = $this->repo->getById($id, ['user']);
        if (!$PhoneNumber) {
            throw new PhoneNumberNotFoundException();
        }
        return $PhoneNumber;
    }

    public function update(PhoneNumber $PhoneNumber, array $data): PhoneNumber
    {
        return $this->repo->update($PhoneNumber, $data);
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new PhoneNumberNotFoundException();
        }
        return true;
    }
}
