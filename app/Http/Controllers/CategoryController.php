<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResource;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
//use App\Http\Resources\Post as PostResource;


class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
      //  return PostResource::collection($categories);

    }

    public function create()
    {

        return view('dashboard.category.create');
    }
    public function get(Request $request)
//{
    $categories = Category::all();
    $categories = Category::where('status', 1)->get();
    return PostResource::collection($categories);

    category::chunk(1000, function ($dataChunk) {
    dispatch(new SendDataChunk($dataChunk));
});

    return response()->json(['message' => 'Data sending job dispatched']);
}



    //return Category::all();

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
