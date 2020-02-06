<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $items = Session::has('cart') ? Session::get('cart') : [];
        return view('cart', compact('items'));
    }
    public function add(Request $request)
    {
        $product = $request->get('product');

        //Verificamos se existe sessao para produtos
        if (Session::has('cart')) {
            // Existindo eu adiciono este produtos na sessao existente
            Session::push('cart', $product);
        } else {
            // Não existindo eu crio esta sessao com o primeiro produto
            $products[] = $product;

            Session::put('cart', $products);
        }

        flash('Produto Adicionado no carrinho')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);

    }
}
