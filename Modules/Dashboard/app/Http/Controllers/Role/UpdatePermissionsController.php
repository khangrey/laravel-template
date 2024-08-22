<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers\Role;

use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Dashboard\Actions\Role\UpdatePermissionsAction;
use Modules\Dashboard\Http\Requests\Role\UpdatePermissionsRequest;
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
