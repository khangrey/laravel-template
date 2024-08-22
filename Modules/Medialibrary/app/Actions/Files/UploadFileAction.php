<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Actions\Files;

use Illuminate\Http\UploadedFile;
use Modules\Medialibrary\Traits\UploadFileHelper;
use Storage;

final class UploadFileAction
{
    use UploadFileHelper;

    public function upload(UploadedFile $file): bool|string
    {
        if ( ! $file) {
            return false;
        }

        $file_name = $this->hash() . $this->extension($file);
        $driver = $this->driver();
        $driver->putFileAs($this->path(), $file, $file_name);

        return $driver->url($this->path() . $file_name);
    }

    public function cleanURL(string $file_str): array|string|null
    {
        $file_str = str_replace('\/', '/', $file_str);
        $file_str = str_replace('"', '', $file_str);
        $file_str = str_replace('[', '', $file_str);
        $file_str = str_replace(']', '', $file_str);
        if ( ! $file_str || '' === trim($file_str)) {
            return null;
        }

        return $file_str;
    }

    public function deleteFile(string $photo_path): bool
    {
        $disk = $this->driver();
        $photo_path = $this->cleanFilePath($photo_path);

        return $disk->exists($photo_path) && $disk->delete($photo_path);
    }

    public function cleanFilePath(
        string $file_path,
        bool $withStorageWord = false
    ): array|string {
        $parsed = parse_url($file_path);
        $file_path = $parsed['path'];

        return $withStorageWord
            ? $file_path
            : $this->deleteStorageWord($file_path);
    }

    public function getFileName(string $file_path): string
    {
        $array = explode('/', $file_path);

        return $array[4];
    }

    public function getStoragePath(string $path): string
    {
        $final_path = "public{$path}";
        if ( ! Storage::exists($final_path)) {
            $dir_path = explode('/', $path)[0];
            Storage::makeDirectory("public{$dir_path}");
        }

        return Storage::path($final_path);
    }
}
