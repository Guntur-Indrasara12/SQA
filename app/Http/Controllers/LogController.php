<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use Illuminate\Http\Request;


class LogController extends Controller
{
    protected $LogService;

    public function __construct(LogService $LogService)
    {
        $this->LogService = $LogService;
    }

    public function index(request $request)
    {
        // $Logs = $this->LogService->getAllLogs();
        $Logs = $this->LogService->getFilteredLogs($request);
        return view('Logs.index', compact('Logs'));
    }


    public function show($id)
    {

        $Log = $this->LogService->getLogById($id);
        return view('Logs.show', compact('Log'));

    }
}
