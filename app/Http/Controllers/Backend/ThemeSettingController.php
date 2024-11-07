<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ThemeSettingController extends Controller
{
    public function darkTheme()
    {
        Cache::forget('light-theme');
        Cache::forget('default-theme');
        Cache::forever('dark-theme', true);
        return back();
    }

    public function lightTheme()
    {
        Cache::forget('dark-theme');
        Cache::forget('default-theme');
        Cache::forever('light-theme', true);
        return back();
    }

    public function defaultTheme()
    {
        Cache::forget('dark-theme');
        Cache::forget('light-theme');
        Cache::forever('default-theme', true);
        return back();
    }
}
