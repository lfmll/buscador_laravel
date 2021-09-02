<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('app');
});

Route::get('/posts', function(){
    $posts=Post::all();
    return response()->json([
        'posts'=>$posts
    ]);
});

Route::post('posts/search',function(){
    $posts=Post::where('title','like','%'.request()->q.'%')
        ->orWhere('content','like','%'.request()->q.'%')
        ->get();

    return response()->json([
        'posts'=>$posts
    ]);        
});