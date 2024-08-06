<?php

declare(strict_types=1);

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

final class TaskResourceCommand extends Command
{
    protected $signature = 'task:resource {name}';

    protected $description = 'Create task resource';

    public function handle(): void
    {
        $name = str($this->argument('name'));
        $dir = $this->laravel->basePath('/app/Tasks/' . $name->ucfirst()->value());
        $types = ['list', 'create', 'find', 'update', 'delete'];
        if ( ! is_dir($dir)) {
            File::makeDirectory($dir);
        }
        foreach ($types as $type) {
            if ('list' === $type) {
                $className = 'List' . $name->ucfirst()->plural() . 'Task';
            } else {
                $className = str($type)->ucfirst() . $name->ucfirst() . 'Task';
            }
            $this->call(MakeTaskCommand::class, [
                'name' => $name->ucfirst() . '/' . $className,
                '--type' => $type,
            ]);
        }
    }
}
