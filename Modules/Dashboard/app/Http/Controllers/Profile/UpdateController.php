<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers\Profile;

use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Dashboard\Actions\User\UpdateUserAction;
use Modules\Dashboard\Http\Requests\User\UpdateRequest as ProfileUpdateRequest;

final class UpdateController extends Controller
{
    private UpdateUserAction $updateUserAction;

    public function __construct(UpdateUserAction $updateUserAction)
    {
        $this->updateUserAction = $updateUserAction;
    }

    public function edit(): View
    {
        return view('dashboard::profile.edit');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $this->updateUserAction->run($request->validated(), Auth::id());
        } catch (UpdateResourceFailedException $e) {
            notyf()->addError($e->getMessage());

            return back();
        }

        notyf()->addSuccess(__('Profile has been updated successfully.'));

        return back();
    }
}
