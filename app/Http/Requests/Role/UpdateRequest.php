<?php

declare(strict_types=1);

namespace App\Http\Requests\Role;

use App\Enums\RolesEnum;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(RolesEnum::SUPERUSER);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:roles,name',
            'guard_name' => 'nullable|string|max:255',
        ];
    }
}
