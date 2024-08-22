<?php

declare(strict_types=1);

namespace Modules\Medialibrary\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Modules\Medialibrary\Actions\Files\UploadFileAction;
use Modules\Medialibrary\Http\Requests\Files\UploadRequest;

final class UploadController extends Controller
{
    private UploadFileAction $uploadFileAction;

    public function __construct(UploadFileAction $uploadFileAction)
    {
        $this->uploadFileAction = $uploadFileAction;
    }

    public function __invoke(UploadRequest $request)
    {
        return response()->json([
            $this->uploadFileAction->upload($request->file('uploaded_file')),
        ]);
    }
}
