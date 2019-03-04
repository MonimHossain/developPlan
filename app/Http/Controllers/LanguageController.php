<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        App::setLocale($request->lang);
        $request->session()->put('locale',$request->lang);
    }
}
