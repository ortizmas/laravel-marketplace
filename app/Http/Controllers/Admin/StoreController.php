<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(10);

        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        return view('admin.stores.create');
    }

    public function store(Request $request, Store $store)
    {
        $data = $request->all();
        $user = auth()->user();

        /*if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }*/

        $store = $user->store()->create($data);

        flash('Loja Criada com Sucesso')->success();
        return redirect()->route('stores.index');
    }

    public function edit(Request $request, Store $store)
    {
        $store = Store::find($store->id);
        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $data = $request->all();
        $store = Store::find($store->id);

        if ($request->hasFile('logo')) {
            if (Storage::disk('public')->exists($store->logo)) {
                Storage::disk('public')->delete($store->logo);
            }

            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
        
        $store->update($data);

        flash('Loja Atualizada com Sucesso')->success();
        return redirect()->route('stores.index');

    }

    public function destroy(Store $store)
    {
        $store = Store::find($store->id);
        $store->delete();

        flash('Loja removida com sucesso')->success();
        return redirect()->route('stores.index');
    }
}
