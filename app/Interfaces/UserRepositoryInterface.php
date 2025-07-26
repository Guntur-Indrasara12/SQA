<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use App\Models\User;

interface UserRepositoryInterface
{
    public function all(): iterable;
    public function filter(Request $request): iterable;

    public function create(array $data): User;
    public function getById($id): ?User;
    public function update(User $User, array $data): User;
    public function delete($id): bool;

    public function detachHobby(User $user, int $hobbyId): void;

    public function attachHobby(User $user, int $hobbyId): void;
}
