<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create-user');
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'sometimes|confirmed',
            'avatar' => 'sometimes|image|max:5120',
        ];
    }
}
