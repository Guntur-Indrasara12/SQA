<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @property int $id
 * @property string $name
 * @property integer $age
 * @property string $description
 * 
 */
class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'description' => $this->description,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
