<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        //Session::forget('pagseguro_session_code');
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->makePagSeguroSession();

        print(Session::get('pagseguro_session_code'));
    
        return view('checkout');
    }

    private function makePagSeguroSession() {
        if (!Session::has('pagseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            return Session::put('pagseguro_session_code', $sessionCode->getResult());
        }
    }

    public function payment(Request $request)
    {
        $data = $request->all();
        // $date = explode('/', $data['cc-exp']);
        // $data['cc-month'] = $date[0];
        // $data['cc-year'] = $date[1];
        dd($data);
    }
}
