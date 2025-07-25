<?php

namespace App\Services;

use App\Exceptions\Hobby\HobbyNotFoundException;
use Illuminate\Http\Request;
use App\Interfaces\HobbyRepositoryInterface;
use App\Models\Hobby;
use Illuminate\Support\Facades\Cache;

class HobbyService
{
    protected $repo;

    public function __construct(HobbyRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getAllHobbys()
    {
        return Cache::remember('Hobbys.all', now()->addMinutes(30), function () {
            return $this->repo->all();
        });
    }

    public function getFilteredHobbys(Request $request)
    {
        return $this->repo->filter($request);
    }
    public function create(array $data): Hobby
    {
        Cache::forget('Hobbys.all');
        return $this->repo->create($data);
    }

    public function getHobbyById($id): ?Hobby
    {
        $Hobby = $this->repo->getById($id);
        if (!$Hobby) {
            throw new HobbyNotFoundException();
        }
        return $Hobby;
    }

    public function update(Hobby $Hobby, array $data): Hobby
    {
        Cache::forget('Hobbys.all');
        return $this->repo->update($Hobby, $data);
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new HobbyNotFoundException();
        }
        Cache::forget('Hobbys.all');
        return true;
    }
}
