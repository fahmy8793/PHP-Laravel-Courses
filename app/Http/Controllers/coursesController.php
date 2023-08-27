<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCoursesRequest;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\Post as PostResource;


class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // dd('a');
        $courses = Courses::with('namecategory')->get();
        return view('dashboard.course.index', compact('courses'));
        //return PostResource::collection($courses);

    }

    public function get(Request $request)
    {
        $courses = Courses::with('namecategory')->get();
        return PostResource::collection($courses);

//        $courses = new courses();
//        $courses->name = $request->input('name');
//        $courses->description = $request->input('description');
//        $courses->price - $request->input('price');

//        $courses->save();
//
        return response()->json($courses);
//        return response()->json(['message' => 'Data stored successfully'], 201);


    }
    public function create()
    {
        $categories = Category::all();
        $courses = Courses::with('namecategory')->get();

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
//public function show($filename)
//{
//    // Assuming images are stored in public/images directory
//    $path = public_path('images/' . $filename);
//
//    // Check if the image file exists
//    if (!file_exists($path)) {
//        return response()->json(['message' => 'Image not found'], 404);
//    }
//
//    // Return the image with appropriate content type and headers
//    $file = file_get_contents($path);
//    $type = mime_content_type($path);
//
//    return response($file)->header('Content-Type', $type);
//}

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
            'youtubelink'=> 'nullable'

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

    public function show ($youtubelink)
    {
        $path = storage_path('app/public/videos/' . $youtubelink); // Update the path as needed
        $file = file_get_contents($path);
        $response = response($file, 200);
        $response->header('Content-Type', 'video/mp4'); // Adjust the Content-Type if needed
        return $response;
       // return view('dashboard.course.edit', compact('course'));
    }

    public function destroy(Courses $course)
    {
        // Soft delete the product
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Courses deleted successfully.');
    }
}
