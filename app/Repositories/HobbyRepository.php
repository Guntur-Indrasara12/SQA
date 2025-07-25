<?php

namespace App\Repositories;

use App\Models\Hobby;
use Illuminate\Http\Request;
use App\Interfaces\HobbyRepositoryInterface;

class HobbyRepository implements HobbyRepositoryInterface
{
    public function all(): iterable
    {
        return Hobby::all();
    }

    public function filter(Request $request): iterable
    {
        return Hobby::applyFilters($request, ['name', 'status', 'price'])
            ->paginate($request->input('per_page', 10));
    }

    public function create(array $data): Hobby
    {
        return Hobby::create($data);
    }

    public function getById($id): ?Hobby
    {
        return Hobby::find($id);
    }
    public function update(Hobby $Hobby, array $data): Hobby
    {
        $Hobby->update($data);
        return $Hobby;
    }
    public function delete($id): bool
    {
        $Hobby = Hobby::find($id);
        if ($Hobby) {
            return $Hobby->delete();
        }
        return false;
    }
}
