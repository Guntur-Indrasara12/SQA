<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachHobbyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hobby_id' => 'required|integer|exists:hobbies,id',
        ];
    }
}