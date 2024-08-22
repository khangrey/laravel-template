<?php

declare(strict_types=1);

namespace Modules\Dashboard\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

final class AppLayout extends Component
{
    /**
     * Get the view that represent the component.
     */
    public function render(): View
    {
        return view('dashboard::layouts.app');
    }
}
