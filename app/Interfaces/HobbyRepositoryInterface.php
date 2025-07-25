<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use App\Models\Hobby;

interface HobbyRepositoryInterface
{
    public function all(): iterable;
    public function filter(Request $request): iterable;

    public function create(array $data): Hobby;
    public function getById($id): ?Hobby;
    public function update(Hobby $Hobby, array $data): Hobby;
    public function delete($id): bool;
}
