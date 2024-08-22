<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => __('dashboard::app.Email'),
            'password' => __('dashboard::app.Password'),
        ];
    }
}
