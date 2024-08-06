<?php

declare(strict_types=1);

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

final class ActionResourceCommand extends Command
{
    protected $signature = 'action:resource {name}';

    protected $description = 'Create action resource';

    public function handle(): void
    {
        $name = str($this->argument('name'));
        $dir = $this->laravel->basePath('/app/Actions/' . $name->ucfirst()->value());
        $types = ['list', 'create', 'find', 'update', 'delete'];
        if ( ! is_dir($dir)) {
            File::makeDirectory($dir);
        }
        foreach ($types as $type) {
            if ('list' === $type) {
                $className = 'List' . $name->ucfirst()->plural() . 'Action';
            } else {
                $className = str($type)->ucfirst() . $name->ucfirst() . 'Action';
            }
            $this->call(MakeActionCommand::class, [
                'name' => $name->ucfirst() . '/' . $className,
                '--type' => $type,
            ]);
        }
    }
}
