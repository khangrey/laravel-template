<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Actions\Permission\CreatePermissionAction;
use App\Actions\Permission\DeletePermissionAction;
use App\Actions\Permission\ListPermissionsAction;
use App\Actions\Permission\UpdatePermissionAction;
use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\DeleteResourceFailedException;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class PermissionController extends Controller
{
    private ListPermissionsAction $listPermissionsAction;

    private CreatePermissionAction $createPermissionAction;

    private UpdatePermissionAction $updatePermissionAction;

    private DeletePermissionAction $deletePermissionAction;

    public function __construct(
        ListPermissionsAction $listPermissionsAction,
        CreatePermissionAction $createPermissionAction,
        UpdatePermissionAction $updatePermissionAction,
        DeletePermissionAction $deletePermissionAction,
    ) {
        $this->listPermissionsAction = $listPermissionsAction;
        $this->createPermissionAction = $createPermissionAction;
        $this->updatePermissionAction = $updatePermissionAction;
        $this->deletePermissionAction = $deletePermissionAction;
    }

    public function index(): View
    {
        return view('dashboard.permissions.index', [
            'permissions' => $this->listPermissionsAction->run(paginate: true),
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $this->createPermissionAction->run($request->validated());
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
            $this->updatePermissionAction->run($request->validated(), $id);
        } catch (UpdateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addUpdated();

        return back();
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $this->deletePermissionAction->run($id);
        } catch (DeleteResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addDeleted();

        return back();
    }
}
