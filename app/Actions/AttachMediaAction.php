<?php

declare(strict_types=1);

namespace App\Actions;

use App\Exceptions\CreateResourceFailedException;
use App\Tasks\AttachMediaTask;
use Exception;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class AttachMediaAction
{
    private AttachMediaTask $attachMediaTask;

    public function __construct(AttachMediaTask $attachMediaTask)
    {
        $this->attachMediaTask = $attachMediaTask;
    }

    public function run(HasMedia $object, string|UploadedFile $uploadedFile, string $collection): Media
    {
        try {
            return $this->attachMediaTask->run($object, $uploadedFile, $collection);
        } catch (Exception $e) {
            throw new CreateResourceFailedException($e->getMessage());
        }
    }
}
