<?php

declare(strict_types=1);

namespace Modules\Dashboard\Console\Commands;

use App\Exceptions\CreateResourceFailedException;
use Exception;
use Illuminate\Console\Command;
use Modules\Dashboard\Actions\User\CreateAdminAction;
use Modules\Dashboard\Actions\User\FindUserAction;
use Modules\Dashboard\Actions\User\FindUserByEmailAction;
use Modules\Dashboard\Enums\RolesEnum;
use Throwable;

final class CreateAdminCommand extends Command
{
    /**
     * Имя и подпись консольной команды.
     *
     * @var string
     */
    protected $signature = 'create:admin {name?} {email?} {password?} {--id=}';

    /**
     * Описание консольной команды.
     *
     * @var string
     */
    protected $description = 'Создать супер-пользователя или дать роль супер-пользователь данному пользователю.';

    /**
     * Действие для создания супер-пользователя.
     */
    protected readonly CreateAdminAction $createAdminAction;

    /**
     * Действие для поиска по почте пользователя.
     */
    protected readonly FindUserByEmailAction $findUserByEmailAction;

    /**
     * Действие для поиска пользователя.
     */
    protected readonly FindUserAction $findUserAction;

    /**
     * Конструктор класса.
     */
    public function __construct(
        CreateAdminAction $createAdminAction,
        FindUserByEmailAction $findUserByEmailAction,
        FindUserAction $findUserAction
    ) {
        parent::__construct();
        $this->createAdminAction = $createAdminAction;
        $this->findUserByEmailAction = $findUserByEmailAction;
        $this->findUserAction = $findUserAction;
    }

    /**
     * Выполнение консольной команды.
     */
    public function handle(): int
    {
        $userId = $this->option('id');
        try {
            if (empty($userId)) {
                $this->createUser();
            } else {
                $this->assignRoleToUser($userId);
            }
        } catch (Exception|Throwable $e) {
            $this->error($e->getMessage());
        }

        return 0;
    }

    /**
     * Создание нового пользователя.
     *
     * @throws CreateResourceFailedException
     * @throws \App\Exceptions\NotFoundException
     * @throws Throwable
     */
    public function createUser(): void
    {
        $name = $this->getArgumentWithAsk('name', 'What is your name?', 'admin');
        $email = $this->getArgumentWithAsk('email', 'What is your email?', 'admin@admin.com');
        $password = $this->getArgumentWithAsk('password', 'What is the password?', secret: true);
        throw_if($this->findUserByEmailAction->run($email)->count(), CreateResourceFailedException::class);
        $this->createAdminAction->run($email, $name, $password);
        $this->info('User created successfully.');
    }

    /**
     * Назначить роль данного пользователя.
     *
     * @throws \App\Exceptions\NotFoundException
     */
    public function assignRoleToUser(mixed $id): void
    {
        $user = $this->findUserAction->run($id);
        $user->assignRole(RolesEnum::SUPERUSER);
        $this->info('Role superuser assigned to user successfully.');
    }

    /**
     * Получение аргумента если не указали надо спросить через консоль.
     */
    private function getArgumentWithAsk(
        string $key,
        string $question,
        ?string $default = null,
        bool $secret = false
    ): mixed {
        return ($this->argument($key) ?:
            $secret)
            ? $this->secret($question)
            : $this->ask($question, $default);
    }
}
