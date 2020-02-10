<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        return view('checkout');
    }
}
