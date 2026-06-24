<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.view');
//cara lain manggil function bisa AuthController@showLogin

Route::prefix('register')->name('register.')->group(function(){
    Route::get('/register', [AuthController::class, 'showRegister'])->name('view');
    Route::post('/register', [AuthController::class, 'register'])->name('do');
});

Route::get('/login', function() {
    return view('login');
})->name('login.view');

Route::post('/login', [AuthController::class, 'login'])->name('login.do');

Route::get('/register', function() {
    return view('register');
})->name('register.view');

Route::post('/register')->name('register.create');

Route::prefix('product')->group(function() {
    Route::get('/list', function() {
        return "<h1>Product List</h1>";
    })->name('product.list');
    Route::get('/detail', function() {
        return "<h1>Product Detail</h1>";
    })->name('product.detail');
});

Route::get('/hubungi-kami', function() {
    return "<h1>Contact Us</h1>";
});

Route::redirect('/contact-us', '/hubungi-kami');

Route::get("/home", [HomeController::class, 'showHome'])->name('home');

Route::prefix('students')->name('students.')->group(function(){
    Route::get('/create', [StudentController::class, 'showCreate'])->name('create');
    Route::post('/create', [StudentController::class, 'insertStudent'])->name('insert');
    Route::get('/edit/{id}', [StudentController::class, 'showEdit'])->name('edit');
    Route::patch('/edit/{id}', [StudentController::class, 'updateStudent'])->name('update');
    Route::delete('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete');
    Route::post('/score/create', [StudentController::class, 'insertScore'])->name('score.insert');
    Route::post('/predict/{id}', [StudentController::class, 'predictScore'])->name('predict');
    Route::get('{id}', [StudentController::class, 'detail'])->name('detail');
});

#WAJIB PAKE CONTROLLER SEMUA GABISA LANGSUNG VIEW KAYA DIATAS
Route::get('/about', [AboutController::class, 'index'])->name('about.view');