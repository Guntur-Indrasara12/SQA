<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\LogRepositoryInterface;
use App\Models\Log;
use Illuminate\Support\Facades\Cache;

class LogService
{
    protected $repo;

    public function __construct(LogRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getAllLogs()
    {
        return Cache::remember('Logs.all', now()->addMinutes(30), function () {
            return $this->repo->all();
        });
    }

    public function getFilteredLogs(Request $request)
    {
        return $this->repo->filter($request);
    }

    public function getLogById($id): ?Log
    {
        $Log = $this->repo->getById($id);
        return $Log;
    }

}
