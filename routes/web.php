<?php


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TandC;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $res = array("a"=>1,"b"=>2,"c"=>3);
    // return response()->json($res);
    return view("welcome");

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article/create/{id?}',[App\Http\Controllers\HomeController::class, 'create']);

Route::post('article/create/store/{id?}',[App\Http\Controllers\HomeController::class, 'store']);

Route::get('/tag',[App\Http\Controllers\HomeController::class, 'tag']);

Route::get('/category',[App\Http\Controllers\HomeController::class, 'category']);


Route::get('/article/delete/{id}',[App\Http\Controllers\HomeController::class,'delete']);

Route::get('/tags/{id?}',[App\Http\Controllers\TandC::class,'getTag']);

Route::post('/tags/{id?}',[App\Http\Controllers\TandC::class,'postTag']);

Route::get('/delete/{id?}',[App\Http\Controllers\TandC::class,'delete']);

Route::get('/alltags',[App\Http\Controllers\TandC::class,'allTags']);

Route::get('/category',[App\Http\Controllers\TandC::class,'getCat']);

Route::post('/category/{id?}',[App\Http\Controllers\TandC::class,'postCat']);

Route::get('/category/{id?}',[App\Http\Controllers\TandC::class,'getCat']);

Route::get('/allcategory',[App\Http\Controllers\TandC::class,'allCategory']);

