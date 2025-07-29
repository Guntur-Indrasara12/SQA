<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttachHobbyRequest;
use App\Http\Resources\V1\UserResource;
use App\Services\UserServices;
use Illuminate\Http\Request;
use App\Http\Resources\V1\ProfileResource;
use App\Http\Resources\V1\HobbyResource;
use App\Http\Resources\V1\PhoneNumberResource;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $User = $this->userService->getAllUser();
        return UserResource::collection($User);
    }
    public function attachHobby(AttachHobbyRequest $request)
    {
        $user = $this->userService->assignHobbyToUser(
            $request->validated()['hobby_id']
        );

        return response()->json([
            'success' => true,
            'message' => 'Hobby successfully attached to user.',
            'data' => new UserResource($user)
        ]);
    }


    public function detachHobby(int $hobbyId)
    {
        $user = $this->userService->removeHobbyFromUser($hobbyId);

        return response()->json([
            'success' => true,
            'message' => 'Hobby successfully detached from user.',
            'data' => new UserResource($user)
        ]);
    }


    public function getProfile(Request $request)
    {
        $user = $request->user();
        return new ProfileResource($user->load('profile')->profile);
    }


    public function getHobbies(Request $request)
    {
        $user = $request->user();
        return HobbyResource::collection($user->hobbies);
    }


    public function getPhoneNumbers(Request $request)
    {
        $user = $request->user();

        return PhoneNumberResource::collection($user->phoneNumbers);
    }
}
