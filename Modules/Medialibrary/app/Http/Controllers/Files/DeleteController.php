<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Medialibrary\Actions\Files\UploadFileAction;

final class DeleteController extends Controller
{
    private UploadFileAction $uploadFileAction;

    public function __construct(UploadFileAction $uploadFileAction)
    {
        $this->uploadFileAction = $uploadFileAction;
    }

    public function __invoke(Request $request): void
    {
        $this->uploadFileAction->deleteFile(
            $this->uploadFileAction->cleanURL($request->getContent())
        );
    }
}
