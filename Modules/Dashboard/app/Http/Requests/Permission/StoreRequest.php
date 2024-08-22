<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Dashboard\Enums\RolesEnum;

final class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(RolesEnum::SUPERUSER);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'guard_name' => 'nullable|string|max:255',
        ];
    }
}
