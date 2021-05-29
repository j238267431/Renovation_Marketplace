<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsesController extends Controller
{
    public function index()
    {
        $companies = Auth::user()->companies;
        return view('account.company.responses.index', ['companies' => $companies]);
    }
}
