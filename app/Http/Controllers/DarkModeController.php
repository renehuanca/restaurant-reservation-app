<?php

namespace App\Http\Controllers;

class DarkModeController extends Controller
{
    /**
     * The default dark mode.
     * 
     * @var boolean
     */
    public const DEFAULT_DARK_MODE = true;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        session([
            'dark_mode' => session()->has('dark_mode') ? !session()->get('dark_mode') : self::DEFAULT_DARK_MODE
        ]);

        return back();
    }
}
