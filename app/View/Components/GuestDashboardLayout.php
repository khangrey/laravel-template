<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestDashboardLayout extends Component
{
    /**
     * Get the view that represent the component.
     */
    public function render(): View
    {
        return view('layouts.guest-dashboard');
    }
}
