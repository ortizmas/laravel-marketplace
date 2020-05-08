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

    /**
     * Function sem uso de PagSeguro
     * @return [type] [description]
     */
    public function confirmOrder()
    {
        $user = Auth()->user()->id;
        dd($user->orders());
        //Session::forget('pagseguro_session_code');
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('confirm-order');
    }

    public function proccess(Request $request)
    {
        $user = Auth()->user();
        // Itens do carrinho na sessão
        $cartItems = session()->get('cart');

        // Dados do formulario
        $dataClient = $request->all();

        $userOrder = [
            'reference' => $request->name,
            'buy_status' => 'PEDIDO',
            'items' => serialize($cartItems),
            'user_id' => $user->id,
            'store_id' => 10
        ];

        //dd($userOrder);

        $user->orders()->create($userOrder);

        return response()->json([
            'data' => [
                'status' => true,
                'message' => 'Pedido criado com sucess0'
            ]
        ]);

        
        //dd($request->all());
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
