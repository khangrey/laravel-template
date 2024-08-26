<?php

declare(strict_types=1);

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Modules\Dashboard\Console\Commands\MakeModuleActionCommand;

final class ActionResourceCommand extends Command
{
    protected $signature = 'action:resource {name}';

    protected $description = 'Create action resource';

    public function handle(): void
    {
        $name = str($this->argument('name'));
        $dir = $this->laravel->basePath('/app/Actions/' . $name->ucfirst()->value());
        if ( ! empty($this->argument('module'))) {
            $dir = module_path($this->argument('module'), 'app/Actions/');
        }
        $types = ['list', 'create', 'find', 'update', 'delete'];
        if ( ! File::isDirectory($dir)) {
            File::makeDirectory($dir, 0777, true);
        }
        foreach ($types as $type) {
            if ('list' === $type) {
                $className = 'List' . $name->ucfirst()->plural() . 'Action';
            } else {
                $className = str($type)->ucfirst() . $name->ucfirst() . 'Action';
            }
            $arguments = [
                'name' => $name->ucfirst() . '/' . $className,
                '--type' => $type,
            ];
            if ( ! empty($this->argument('module'))) {
                $arguments['module'] = $this->argument('module');

                $this->call(MakeModuleActionCommand::class, $arguments);
            } else {
                $this->call(MakeActionCommand::class, $arguments);
            }
        }
    }
}
