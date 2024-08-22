<?php

declare(strict_types=1);

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class WelcomeController extends Controller
{
    /**
     * Вывод главной страницы панеля управления.
     */
    public function __invoke(Request $request): View
    {
        return view('dashboard::welcome');
    }
}
