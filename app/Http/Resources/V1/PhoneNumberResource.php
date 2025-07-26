<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @property int $id
 * @property string $phone
 * @property integer $age
 * @property string $description
 * 
 */
class PhoneNumberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
