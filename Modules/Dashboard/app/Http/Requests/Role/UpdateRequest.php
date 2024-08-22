<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Dashboard\Enums\RolesEnum;

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
