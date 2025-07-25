<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use App\Models\Log;

interface LogRepositoryInterface
{
    public function all(): iterable;
    public function filter(Request $request): iterable;
    public function getById($id): ?Log;
}
