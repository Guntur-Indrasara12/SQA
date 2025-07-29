<?php

namespace App\Services;

use App\Exceptions\User\UserNotFoundException;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
class UserServices
{
    protected $repo;
    const CACHE_KEY_ALL_USERS = 'users.all';

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handles the business logic for creating a new user.
     * This includes hashing the password before saving.
     *
     * @param array $data The validated data from the request.
     * @return User
     */
    public function getAllUser()
    {
        return Cache::remember('User.all', now()->addMinutes(30), function () {
            return $this->repo->all();
        });
    }
    public function createUser(array $data): User
    {
        Cache::forget(self::CACHE_KEY_ALL_USERS);

        $preparedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        return $this->repo->create($preparedData);
    }

    public function getUserById($id): User
    {
        $user = $this->repo->getById($id);
        if (!$user) {
            throw new UserNotFoundException();
        }
        return $user;
    }

    public function update(User $user, array $data): User
    {
        $updatedUser = $this->repo->update($user, $data);
        Cache::forget(self::CACHE_KEY_ALL_USERS);
        return $updatedUser;
    }

    public function delete($id): bool
    {
        $deleted = $this->repo->delete($id);
        if (!$deleted) {
            throw new UserNotFoundException();
        }
        Cache::forget(self::CACHE_KEY_ALL_USERS);
        return true;
    }

    public function getAllUsers()
    {
        return Cache::remember(self::CACHE_KEY_ALL_USERS, now()->addMinutes(30), function () {
            return $this->repo->all();
        });
    }

    public function getFilteredUsers(Request $request)
    {
        return $this->repo->filter($request);
    }

    public function assignHobbyToUser(int $hobbyId): User
    {
        $user = auth()->user();
        $this->repo->attachHobby($user, $hobbyId);
        return $user->load('hobbies');
    }

    /**
     *
     * @param int $userId
     * @param int $hobbyId
     * @return User
     */
    public function removeHobbyFromUser(int $hobbyId): User
    {
        $user = auth()->user();
        $this->repo->detachHobby($user, $hobbyId);
        return $user->load('hobbies');
    }
}
