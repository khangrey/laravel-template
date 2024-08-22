<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Traits;

use Illuminate\Filesystem\FilesystemAdapter;
use Storage;
use Str;

trait UploadFileHelper
{
    public function clean(string $photo_path): bool
    {
        $disk = $this->driver();

        return $disk->exists($photo_path) && $disk->delete($photo_path);
    }

    public function extension($file): string
    {
        return '.' . $file->getClientOriginalExtension();
    }

    public function hash(): string
    {
        return Str::random(40);
    }

    public function path(): string
    {
        return date('Y/m/d', time()) . '/';
    }

    public function driver(): FilesystemAdapter
    {
        return Storage::disk('public');
    }

    public function url(string $file_path, string $disk = 'public'): ?string
    {
        $disk = Storage::disk($disk);

        return $disk->exists($file_path) ? $disk->url($file_path) : null;
    }

    public function deleteStorageWord(string $filePath): array|string
    {
        if (str_contains($filePath, 'storage')) {
            $filePath = str_replace('/storage', '', $filePath);
        }

        return $filePath;
    }

    public function videoMimeTypes(): array
    {
        return [
            'video/mpeg',
            'video/mp4',
            'video/ogg',
            'video/quicktime',
            'video/webm',
            'video/x-ms-wmv',
            'video/x-flv',
            'video/3gpp',
            'video/3gpp2',
        ];
    }

    public function isVideo(string $file_path, string $disk = 's3'): bool
    {
        return in_array(
            Storage::disk($disk)->mimeType($file_path),
            $this->videoMimeTypes()
        );
    }
}
