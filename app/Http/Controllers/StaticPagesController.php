<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function index()
    {
        return view('static.home');
    }

    public function about()
    {
        return view('static.about');
    }

    public function help()
    {
        return view('static.help');
    }
}
