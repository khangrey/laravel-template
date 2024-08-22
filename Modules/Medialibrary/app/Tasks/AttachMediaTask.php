<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Tasks;

use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class AttachMediaTask
{
    public function run(HasMedia $object, string|UploadedFile $uploadedFile, string $collection): Media
    {
        return $object->addMedia($uploadedFile)->toMediaCollection($collection);
    }
}
