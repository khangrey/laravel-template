<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Role;

use App\Actions\Role\UpdatePermissionsAction;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdatePermissionsRequest;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

final class UpdatePermissionsController extends Controller
{
    private UpdatePermissionsAction $updatePermissionsAction;

    public function __construct(UpdatePermissionsAction $updatePermissionsAction)
    {
        $this->updatePermissionsAction = $updatePermissionsAction;
    }

    public function __invoke(UpdatePermissionsRequest $request, Role $role): RedirectResponse
    {
        try {
            $this->updatePermissionsAction->run($request->validated(), $role);
        } catch (UpdateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addSuccess('Для роли были даны разрешения');

        return back();
    }
}
