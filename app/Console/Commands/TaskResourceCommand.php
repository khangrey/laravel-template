<?php

declare(strict_types=1);

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Modules\Dashboard\Console\Commands\MakeModuleTaskCommand;

final class TaskResourceCommand extends Command
{
    protected $signature = 'task:resource {name}';

    protected $description = 'Create task resource';

    public function handle(): void
    {
        $name = str($this->argument('name'));
        $dir = $this->laravel->basePath('/app/Tasks/' . $name->ucfirst()->value());
        $types = ['list', 'create', 'find', 'update', 'delete'];
        if ( ! empty($this->argument('module'))) {
            $dir = module_path($this->argument('module'), 'app/Actions/');
        }
        if ( ! File::isDirectory($dir)) {
            File::makeDirectory($dir, 0777, true);
        }
        foreach ($types as $type) {
            if ('list' === $type) {
                $className = 'List' . $name->ucfirst()->plural() . 'Task';
            } else {
                $className = str($type)->ucfirst() . $name->ucfirst() . 'Task';
            }
            $arguments = [
                'name' => $name->ucfirst() . '/' . $className,
                '--type' => $type,
            ];
            if ( ! empty($this->argument('module'))) {
                $arguments['module'] = $this->argument('module');

                $this->call(MakeModuleTaskCommand::class, $arguments);
            } else {
                $this->call(MakeActionCommand::class, $arguments);
            }
        }
    }
}
