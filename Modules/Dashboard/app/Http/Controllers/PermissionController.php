<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\DeleteResourceFailedException;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Dashboard\Actions\Permission\CreatePermissionAction;
use Modules\Dashboard\Actions\Permission\DeletePermissionAction;
use Modules\Dashboard\Actions\Permission\ListPermissionsAction;
use Modules\Dashboard\Actions\Permission\UpdatePermissionAction;
use Modules\Dashboard\Http\Requests\Permission\StoreRequest;
use Modules\Dashboard\Http\Requests\Permission\UpdateRequest;

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
        return view('dashboard::permissions.index', [
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
