<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHobbyRequest;
use App\Http\Resources\V1\HobbyResource;
use App\Services\HobbyService;

class HobbyController extends Controller
{
    protected $service;

    public function __construct(HobbyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $Hobbys = $this->service->getAllHobbys();
        return HobbyResource::collection($Hobbys);
    }

    public function store(StoreHobbyRequest $request)
    {
        $Hobby = $this->service->create($request->validated());
        return new HobbyResource($Hobby);
    }

    public function show($id)
    {
        $Hobby = $this->service->getHobbyById($id);
        return new HobbyResource($Hobby);
    }

    public function update(StoreHobbyRequest $request, $id)
    {
        $Hobby = $this->service->getHobbyById($id);
        $updated = $this->service->update($Hobby, $request->validated());
        return new HobbyResource($updated);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
