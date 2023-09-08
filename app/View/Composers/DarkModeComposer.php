<?php

namespace App\View\Composers;

use App\Http\Controllers\DarkModeController;
use Illuminate\View\View;

class DarkModeComposer
{
    /**
     * Bind data to the views
     */
    public function compose(View $view)
    {
        $view->with('dark_mode', session()->get('dark_mode', DarkModeController::DEFAULT_DARK_MODE));
    }
}
