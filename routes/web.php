<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home',[
        "active" => "home",
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    /* 
        jika ingin mengirimkan data, maka tambah parameternya 
        function view($view, $data[], $mergeData[]){}

        dalam laravel, "nama" ini akan dikonversi menjadi sebuah variabel 
        $nama, begitu juga dengan email akan menjadi variabel $email
    */
    return view('about',[
        "active" => "about",
        "title" => "About",
        "nama" => "Ananda Ricky Fauzi",
        "email" => "ciel01@gmail.com",
        "NIM" => "203140714111009",
        "fakultas" => "Program Pendidikan Vokasi"
    ]);
});

/* 
    dengan menggunakan controller, kita tidak perlu membuat sebuah
    closure (function) di dalam Route, tinggal menggunakan
    NamaController::class, 'method'
*/
Route::get('/posts', [PostController::class, 'index']);

// halaman single post
Route::get("posts/{post:slug}", [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        "active" => "category",
        'title' => 'kategori',
        'categories' => Category::all()
    ]);
});

// login dan register
Route::get("/login", [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post("/login", [LoginController::class, 'authenticate']);
Route::post("/logout", [LoginController::class, 'logout']);

Route::get("/register", [RegisterController::class, 'index'])->middleware('guest');
Route::post("/register", [RegisterController::class, 'store']);

// dashboard
Route::get("/dashboard", function(){ 
    return view('dashboard/index',[
        'title' => 'dasboard',
        ]);
    })->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)
    ->middleware('auth');