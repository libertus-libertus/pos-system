<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required'],
            ['name.required' => 'Kategori wajib diisi']
        );

        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(
            ['name' => 'required'],
            ['name.required' => 'Kategori wajib diisi'],
        );

        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index')->with('success','Kategori berhasil dihapus');
    }
}
