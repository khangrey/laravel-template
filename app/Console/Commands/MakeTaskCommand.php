<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

final class MakeTaskCommand extends GeneratorCommand
{
    protected $signature = 'make:task {name} {--type=}';

    protected $description = 'Create task class.';

    protected $type = 'Task';

    protected function getStub()
    {
        $stub = null;

        if ($type = $this->option('type')) {
            $stub = "/stubs/tasks/{$type}-task.stub";
        }

        $stub ??= '/stubs/tasks/task.stub';

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
        return $rootNamespace . '\Tasks';
    }
}
