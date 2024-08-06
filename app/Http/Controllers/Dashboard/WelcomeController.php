<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Вывод главной страницы панеля управления.
     */
    public function __invoke(Request $request): View
    {
        return view('dashboard.welcome');
    }
}
