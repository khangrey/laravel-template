<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

final class DashboardLayout extends Component
{
    /**
     * Get the view that represent the component.
     */
    public function render(): View
    {
        return view('layouts.dashboard');
    }
}
