<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadTrait;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // Devolve loja pro usuario 
        $userStore = auth()->user()->store;

        // return products por loja do usuario
        $products = $userStore->products()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {

        $data = $request->all();

        $categories = $request->get('categories', null);

        $store = auth()->user()->store;
        $product = $store->products()->create($data);

        $product->categories()->sync($categories);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto Criado com Sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $categories = Category::all(['id', 'name']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $product = $this->product->find($product->id);
        $product->update($data);
        
        if (!is_null($categories))
            $product->categories()->sync($categories);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto Atualizado com Sucesso!')->success();

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $products = Product::find($product->id);
        $products->delete();

        flash('Produto removido com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

}
