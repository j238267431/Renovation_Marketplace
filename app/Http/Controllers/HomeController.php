<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show home page.
     *
     * @return View
     */
    public function index(): Renderable
    {
        return view('home');
    }
}
