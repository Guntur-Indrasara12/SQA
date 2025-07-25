<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all(array $relations = []): iterable
    {
        return User::with($relations)->get();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function filter(Request $request): iterable
    {
        return User::applyFilters($request, ['name', 'email'])
            ->paginate($request->input('per_page', 10));
    }
    public function getById($id, array $relations = []): ?User
    {
        return User::with($relations)->find($id);
    }

    public function update(User $User, array $data): User
    {
        $User->update($data);
        return $User;
    }
    public function delete($id): bool
    {
        $User = User::find($id);
        if ($User) {
            return $User->delete();
        }
        return false;
    }
}
