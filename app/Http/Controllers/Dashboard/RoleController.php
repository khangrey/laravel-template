<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Actions\Permission\ListPermissionsAction;
use App\Actions\Role\CreateRoleAction;
use App\Actions\Role\DeleteRoleAction;
use App\Actions\Role\ListRolesAction;
use App\Actions\Role\UpdateRoleAction;
use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\DeleteResourceFailedException;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class RoleController extends Controller
{
    private ListRolesAction $listRolesAction;

    private CreateRoleAction $createRoleAction;

    private UpdateRoleAction $updateRoleAction;

    private DeleteRoleAction $deleteRoleAction;

    private ListPermissionsAction $listPermissionsAction;

    public function __construct(
        ListRolesAction $listRolesAction,
        CreateRoleAction $createRoleAction,
        UpdateRoleAction $updateRoleAction,
        DeleteRoleAction $deleteRoleAction,
        ListPermissionsAction $listPermissionsAction
    ) {
        $this->listRolesAction = $listRolesAction;
        $this->createRoleAction = $createRoleAction;
        $this->updateRoleAction = $updateRoleAction;
        $this->deleteRoleAction = $deleteRoleAction;
        $this->listPermissionsAction = $listPermissionsAction;
    }

    public function index(): View
    {
        return view('dashboard.roles.index', [
            'roles' => $this->listRolesAction->run(paginate: true),
            'permissions' => $this->listPermissionsAction->run(),
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $this->createRoleAction->run($request->validated());
        } catch (CreateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addCreated();

        return back();
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        try {
            $this->updateRoleAction->run($request->validated(), $id);
        } catch (UpdateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addCreated();

        return back();
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $this->deleteRoleAction->run($id);
        } catch (DeleteResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addDeleted();

        return back();
    }
}
