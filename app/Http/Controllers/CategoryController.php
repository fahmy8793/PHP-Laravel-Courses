<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('category_photos', 'public');
            $data['photo'] = $path;
        }
        //dd($request->all());


        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('category_photos', 'public');
            $data['photo'] = $path;
        }

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
