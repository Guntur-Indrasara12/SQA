<?php

namespace App\Repositories;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Interfaces\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface
{
    public function all(): iterable
    {
        return Log::all();
    }
    public function filter(Request $request): iterable
    {
        return Log::applyFilters($request, ['name', 'status', 'price'])
            ->paginate($request->input('per_page', 10));
    }
    public function getById($id): ?Log
    {
        return Log::find($id);
    }

}
