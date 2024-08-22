<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\DeleteResourceFailedException;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Dashboard\Actions\User\CreateUserAction;
use Modules\Dashboard\Actions\User\DeleteUserAction;
use Modules\Dashboard\Actions\User\FindUserAction;
use Modules\Dashboard\Actions\User\ListUsersAction;
use Modules\Dashboard\Actions\User\UpdateUserAction;
use Modules\Dashboard\Http\Requests\User\StoreRequest;
use Modules\Dashboard\Http\Requests\User\UpdateRequest;

final class UserController extends Controller
{
    private ListUsersAction $listUsersAction;

    private CreateUserAction $createUserAction;

    private FindUserAction $findUserAction;

    private UpdateUserAction $updateUserAction;

    private DeleteUserAction $deleteUserAction;

    public function __construct(
        ListUsersAction $listUsersAction,
        CreateUserAction $createUserAction,
        FindUserAction $findUserAction,
        UpdateUserAction $updateUserAction,
        DeleteUserAction $deleteUserAction
    ) {
        $this->listUsersAction = $listUsersAction;
        $this->createUserAction = $createUserAction;
        $this->findUserAction = $findUserAction;
        $this->updateUserAction = $updateUserAction;
        $this->deleteUserAction = $deleteUserAction;
    }

    public function index(): View
    {
        return view('dashboard::users.index', [
            'users' => $this->listUsersAction->run(paginate: true, exceptId: Auth::id()),
        ]);
    }

    public function create(): View
    {
        return view('dashboard::users.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $this->createUserAction->run($request->validated());
        } catch (CreateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addCreated();

        return redirect()->route('dashboard.users.index');
    }

    public function edit(string $id): View
    {
        return view('dashboard::users.edit', [
            'user' => $this->findUserAction->run($id),
        ]);
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        try {
            $this->updateUserAction->run($request->validated(), $id);
        } catch (UpdateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addUpdated();

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $this->deleteUserAction->run($id);
        } catch (DeleteResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addDeleted();

        return redirect()->route('dashboard.users.index');
    }
}
