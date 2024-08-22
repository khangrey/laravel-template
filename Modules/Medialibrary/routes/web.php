<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Medialibrary\Http\Controllers\DeleteController as MediaDeleteController;
use Modules\Medialibrary\Http\Controllers\Files\DeleteController as FileDeleteController;
use Modules\Medialibrary\Http\Controllers\Files\UploadController;

Route::get('media/delete/{media}', MediaDeleteController::class)->name('media::delete');

Route::post('files/upload', UploadController::class)->name('media::files.upload');

Route::delete('files/delete', FileDeleteController::class)->name('media::files.delete');
