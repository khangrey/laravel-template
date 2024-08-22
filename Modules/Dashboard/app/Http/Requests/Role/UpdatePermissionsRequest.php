<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Dashboard\Enums\RolesEnum;

final class UpdatePermissionsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(RolesEnum::SUPERUSER);
    }

    public function rules(): array
    {
        return [
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|string|exists:permissions,name',
        ];
    }
}
