<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class DeleteController extends Controller
{
    public function __invoke(Media $media): RedirectResponse
    {
        $media->forceDelete();

        notyf()->addSuccess(__('A media has been deleted successfully.'));

        return back();
    }
}
