<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $product;
    
    public function __construct(Product $products)
    {
        $this->product = $products;
        //$this->middleware('auth');
    }

    public function index()
    {
        $products = $this->product->limit(8)->orderBy('id', 'desc')->get();
        return view('welcome', compact('products'));
    }

    public function single($slug = null)
    {
        $product = $this->product->whereSlug($slug)->first();

        return view('single', compact('product'));
    }
}
