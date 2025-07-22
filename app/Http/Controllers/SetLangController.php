<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLangController extends Controller
{
    public function changeLocalLand($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return redirect()->back();
    }
}
