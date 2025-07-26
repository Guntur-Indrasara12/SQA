<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttachHobbyRequest;
use App\Http\Resources\V1\UserResource;
use App\Services\UserServices;
use Illuminate\Http\JsonResponse;

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
    public function attachHobby(AttachHobbyRequest $request, int $userId)
    {
        $user = $this->userService->assignHobbyToUser(
            $userId,
            $request->validated()['hobby_id']
        );

        return response()->json([
            'success' => true,
            'message' => 'Hobby successfully attached to user.',
            'data' => new UserResource($user)
        ]);
    }


    public function detachHobby(int $userId, int $hobbyId)
    {
        $user = $this->userService->removeHobbyFromUser($userId, $hobbyId);

        return response()->json([
            'success' => true,
            'message' => 'Hobby successfully detached from user.',
            'data' => new UserResource($user)
        ]);
    }
}
