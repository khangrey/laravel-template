<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

final class MakeActionCommand extends GeneratorCommand
{
    protected $signature = 'make:action {name} {--type=}';

    protected $description = 'Create action class.';

    protected $type = 'Action';

    protected function getStub()
    {
        $stub = null;

        if ($type = $this->option('type')) {
            $stub = "/stubs/actions/{$type}-action.stub";
        }

        $stub ??= '/stubs/actions/action.stub';

        return $this->resolveStubPath($stub);
    }

    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Actions';
    }
}
