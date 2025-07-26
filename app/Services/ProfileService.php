<?php

namespace App\Services;

use App\Exceptions\profile\profileNotFoundException;
use App\Interfaces\profileRepositoryInterface;
use App\Models\profile;
use App\Services\UserServices;
use App\Events\profileCreated;

class profileService
{
    protected $repo;
    protected $UserService;

    public function __construct(profileRepositoryInterface $repo, UserServices $UserService)
    {
        $this->repo = $repo;
        $this->UserService = $UserService;
    }


    public function getAllprofiles()
    {
        return $this->repo->all(['user']);
    }


    public function create(array $data, int $userId): profile
    {
        $preparedData = array_merge($data, ['user_id' => $userId]);
        $profile = $this->repo->create($preparedData);
        event(new profileCreated($profile));
        return $profile;
    }


    public function getprofileById($id): ?profile
    {
        $profile = $this->repo->getById($id, ['user']);
        if (!$profile) {
            throw new profileNotFoundException();
        }
        return $profile;
    }

    public function update(profile $profile, array $data): profile
    {
        return $this->repo->update($profile, $data);
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new profileNotFoundException();
        }
        return true;
    }
}
