<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(Category $category)
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except(['_token']);
        $category = new Category();
        $category->create($data);

        flash('Categoria registrado com sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $categoryUpdate = $category->find($category->id);
        //$data = $request->except(['_token', '_method']);
        $data = $request->all();
        $categoryUpdate->update($data);

        flash('Categoria alterado com sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete($category->id);
        flash('Categoria excluido com sucesso')->success();
        return redirect()->route('admin.categories.index');
    }
}
