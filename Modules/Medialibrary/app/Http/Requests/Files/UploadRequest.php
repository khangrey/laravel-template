<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Http\Requests\Files;

use Illuminate\Foundation\Http\FormRequest;

final class UploadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'uploaded_file' => 'required|file|max:4096',
        ];
    }
}
