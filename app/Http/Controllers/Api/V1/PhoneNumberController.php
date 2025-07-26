<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhoneNumberRequest;
use App\Http\Resources\V1\PhoneNumberResource;
use App\Services\PhoneNumberService;
use Illuminate\Support\Facades\Auth;

class PhoneNumberController extends Controller
{
    protected $service;

    public function __construct(PhoneNumberService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $PhoneNumbers = $this->service->getAllPhoneNumbers();
        return PhoneNumberResource::collection($PhoneNumbers);
    }

    public function store(StorePhoneNumberRequest $request)
    {
        $userId = Auth::id();
        $PhoneNumber = $this->service->create($request->validated(), $userId);
        return new PhoneNumberResource($PhoneNumber);
    }

    public function show($id)
    {
        $PhoneNumber = $this->service->getPhoneNumberById($id);
        return new PhoneNumberResource($PhoneNumber);
    }

    public function update(StorePhoneNumberRequest $request, $id)
    {
        $PhoneNumber = $this->service->getPhoneNumberById($id);
        $updated = $this->service->update($PhoneNumber, $request->validated());
        return new PhoneNumberResource($updated);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
