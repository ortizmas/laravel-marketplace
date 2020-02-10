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
            $products = Session::get('cart');
            $productsSlug = array_column($products, 'slug');

            if (in_array($product['slug'], $productsSlug)) {
                $products = $this->productIncrement($product['slug'], $product['amount'], $products);

                Session::put('cart', $products);
            } else {
                Session::push('cart', $product);
            }

        } else {
            // Não existindo eu crio esta sessao com o primeiro produto
            $products[] = $product;

            Session::put('cart', $products);
        }

        flash('Produto Adicionado no carrinho')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);

    }

    public function remove($slug)
    {
        if (!Session::has('cart')) {
            return redirect()->route('cart.index');
        }

        $products = Session::get('cart');

        $products = array_filter($products, function ($line) use ($slug) {
            return $line['slug'] != $slug;
        });

        Session::put('cart', $products);
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        Session::forget('cart');

        flash('Desistencia de compra realizada com sucesso')->success();
        return redirect()->route('cart.index');
    }

    public function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function ($line) use ($slug, $amount) {
            if ($slug == $line['slug']) {
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}
