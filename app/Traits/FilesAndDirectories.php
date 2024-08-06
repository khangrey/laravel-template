<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait FilesAndDirectories
{
    protected function findDirectories(
        string $path,
        string $needle,
        array &$directoriesPaths = []
    ): array {
        $directories = $this->findExistingDirectory($path)
            ? File::directories($path)
            : [];

        $needleArray = explode(DIRECTORY_SEPARATOR, $needle);
        $needleFirst = $needleArray[0];
        $needleAdditions = null;

        if (count($needleArray) > 1) {
            array_shift($needleArray);
            $needleAdditions = implode(DIRECTORY_SEPARATOR, $needleArray);
        }

        foreach ($directories as $directoryPath) {
            $directoryPathInfo = pathinfo($directoryPath);

            if ($directoryPathInfo['basename'] !== $needleFirst) {
                $this->findDirectories(
                    path: $directoryPath,
                    needle: $needle,
                    directoriesPaths: $directoriesPaths
                );
            } else {
                $fullPath =
                    $directoryPath.DIRECTORY_SEPARATOR.$needleAdditions;

                if ($fullPath = $this->findExistingDirectory($fullPath)) {
                    $directoriesPaths[] = $fullPath;
                }
            }
        }

        return $directoriesPaths;
    }

    protected function findExistingDirectory(string $path): ?string
    {
        return File::isDirectory($path) ? $path : null;
    }

    protected function findExistingFile(string $path): ?string
    {
        return File::isFile($path) ? $path : null;
    }

    protected function findFilesInDirectories(string|array $path): array
    {
        $filesPaths = [];

        if (is_array($path)) {
            foreach ($path as $p) {
                $files = File::files($p);
                foreach ($files as $file) {
                    $filesPaths[] = $file->getRealPath();
                }
            }

            return $filesPaths;
        }

        $files = $this->findExistingDirectory($path) ? File::files($path) : [];

        foreach ($files as $file) {
            $filesPaths[] = $file->getRealPath();
        }

        return $filesPaths;
    }

    protected function findNamespaceInFile(string $path): ?string
    {
        $fileStr = File::get($path);
        $fileArray = explode("\n", $fileStr);
        $nameSpaceArray = preg_grep('/^namespace /', $fileArray);

        $namespaceStr = array_shift($nameSpaceArray);

        preg_match('/^namespace (.*);$/', trim($namespaceStr), $match);

        return array_pop($match);
    }

    protected function findAndChainBetween(
        string $path,
        string $before,
        string $after
    ): array {
        $pathArray = explode(DIRECTORY_SEPARATOR, $path);
        $pathPattern = '';
        foreach ($pathArray as $item) {
            $pathPattern .= '('.$item.')(\\\\|\/)';
            if ($item === $before) {
                $pathPattern .= '|(\\\\|\/)'.$after;
                break;
            }
        }

        return preg_split(
            '/'.$pathPattern.'/i',
            $path,
            -1,
            PREG_SPLIT_NO_EMPTY
        );
    }

    protected function getClassFromFile(string $path): string
    {
        return $this->findNamespaceInFile($path).'\\'.File::name($path);
    }

    protected function getNamespaceFromPath(string $path): string
    {
        return implode('\\', array_map('ucfirst', explode('/', $path)));
    }

    protected function createDirectory(string $path): string
    {
        if (! $this->findExistingDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    protected function deleteDirectory(string $path): void
    {
        if (! $this->findExistingDirectory($path)) {
            File::deleteDirectory($path);
        }
    }

    protected function makeFile(
        string $path,
        string $content,
        bool $forceRewrite = false
    ): bool|int {
        if (! $this->findExistingFile($path)) {
            return File::put($path, $content);
        }

        if ($forceRewrite) {
            return File::put($path, $content);
        }

        return false;
    }

    /**
     * @throws \JsonException
     */
    protected function convertFromJsonToArray(string $content): mixed
    {
        return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }
}
