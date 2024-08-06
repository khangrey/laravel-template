<?php

declare(strict_types=1);

namespace App\Http\Requests\Permission;

use App\Enums\RolesEnum;
use Illuminate\Foundation\Http\FormRequest;

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
