<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'name' => 'required|string|max:255',
            'password' => 'sometimes|confirmed',
            'avatar' => 'sometimes|image|max:5120',
        ];
    }
}
