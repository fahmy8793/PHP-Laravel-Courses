<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// routes/api.php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\coursesController;


Route::get('/category', [CategoryController::class, 'get']);

Route::get('/message', function (){
    return "hi";
});


//Route::get('/courses', [coursesController::class, 'get']);

Route::get('/courses', function () {
    $courses = DB::table('courses')->paginate(1000);
    return response()->json([
        'name' => $courses->items(),
        'ended_at' => $courses->items(),
        'started_at' => $courses->items(),
        'price' => $courses->items(),
        'description' => $courses->items(),
        'links' => [
            'prev' => $courses->previousPageUrl(),
            'next' => $courses->nextPageUrl(),
        ]
    ]);
});


//Route::post('/data', [coursesController::class, 'get']);

//Route::post('/data','coursesController@get');
