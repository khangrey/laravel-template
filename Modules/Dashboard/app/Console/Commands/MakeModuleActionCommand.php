<?php

declare(strict_types=1);

namespace Modules\Dashboard\Console\Commands;

use Illuminate\Support\Str;
use Nwidart\Modules\Commands\Make\GeneratorCommand;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

final class MakeModuleActionCommand extends GeneratorCommand
{
    use ModuleCommandTrait;

    protected $argumentName = 'name';

    protected $name = 'make:module-action';

    protected $description = 'Create a new action class for the specified module.';

    public function getDestinationFilePath(): string
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $filePath = GenerateConfigReader::read('actions')->getPath() ?? config('modules.paths.app_folder') . 'Actions';

        return $path . $filePath . '/' . $this->getActionName() . '.php';
    }

    public function getDefaultNamespace(): string
    {
        return config('modules.paths.generator.actions.namespace', 'Actions');
    }

    protected function getTemplateContents(): string
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());

        return $this->getStubContents(__DIR__ . '/stubs/actions' . $this->getStubName(), [
            'CLASS_NAMESPACE' => $this->getClassNamespace($module),
            'CLASS' => $this->getClassNameWithoutNamespace(),
        ]);
    }

    protected function getStubContents(string $path, array $replaces = [])
    {
        $contents = file_get_contents($path);

        foreach ($replaces as $search => $replace) {
            $contents = str_replace('$' . mb_strtoupper($search) . '$', $replace, $contents);
        }

        return $contents;
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the action class.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    protected function getOptions(): array
    {
        return [
            ['type', null, InputOption::VALUE_OPTIONAL, 'Type of class', null],
        ];
    }

    protected function getActionName(): array|string
    {
        return Str::studly($this->argument('name'));
    }

    protected function getStubName(): string
    {
        $stub = null;

        if ($type = $this->option('type')) {
            $stub = "/{$type}-action.stub";
        }

        $stub ??= '/action.stub';

        return $stub;
    }

    private function getClassNameWithoutNamespace(): array|string
    {
        return class_basename($this->getActionName());
    }
}
