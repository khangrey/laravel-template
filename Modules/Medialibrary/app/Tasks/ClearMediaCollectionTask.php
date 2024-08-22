<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Tasks;

use Spatie\MediaLibrary\HasMedia;

final class ClearMediaCollectionTask
{
    public function run(HasMedia $object, string $collectionName): void
    {
        if ($object->hasMedia($collectionName)) {
            $object->clearMediaCollection($collectionName);
        }
    }
}
