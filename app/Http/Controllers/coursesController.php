<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCoursesRequest;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
       // dd('a');
        $courses = Courses::with('category')->get();
        return view('dashboard.course.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.course.create', compact('categories'));
    }

    public function store(StoreCoursesRequest $request)
    {


        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $request['photo'] = $path;
        }


        Courses::create($request->all());
       // dd($request->all());
        return redirect()->route('courses.index')->with('success', 'Courses created successfully.');
    }

    public function edit(Courses $course)
    {
        //$course = Courses::all();
        $categories = Category::all();

        return view('dashboard.course.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Courses $course)
    {
        $data =  $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:category,id',
            'status' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'photo' => 'nullable',
        ]);

        //  $data = $request->all();

        if ($request->hasFile('photo')) {
//            $imageName = time().'.'.request()->image->getClientOriginalExtension();
//            request()->image->move(public_path('images'), $imageName);
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Courses updated successfully.');
    }

    public function show(Courses $course)
    {
        return view('dashboard.course.edit', compact('course'));
    }

    public function destroy(Courses $course)
    {
        // Soft delete the product
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Courses deleted successfully.');
    }
}
