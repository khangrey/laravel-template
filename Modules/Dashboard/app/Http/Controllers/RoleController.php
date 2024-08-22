<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\DeleteResourceFailedException;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Dashboard\Actions\Permission\ListPermissionsAction;
use Modules\Dashboard\Actions\Role\CreateRoleAction;
use Modules\Dashboard\Actions\Role\DeleteRoleAction;
use Modules\Dashboard\Actions\Role\ListRolesAction;
use Modules\Dashboard\Actions\Role\UpdateRoleAction;
use Modules\Dashboard\Http\Requests\Role\StoreRequest;
use Modules\Dashboard\Http\Requests\Role\UpdateRequest;

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
        return view('dashboard::roles.index', [
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
