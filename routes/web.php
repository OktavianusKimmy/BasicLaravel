<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentScoreContoller;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    //cara lain manggil function bisa AuthController@showLogin
    
    Route::prefix('register')->name('register.')->group(function(){
        Route::get('/register', [AuthController::class, 'showRegister'])->name('view');
        Route::post('/register', [AuthController::class, 'register'])->name('do');
    });
    
    Route::post('/login', [AuthController::class, 'login'])->name('login.do');
    
    Route::get('/register', function() {
        return view('register');
    })->name('register.view');
    
    Route::post('/register')->name('register.create');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

Route::middleware('auth')->group(function(){
    Route::get("/home", [HomeController::class, 'showHome'])->name('home');

    Route::prefix('students')->name('students.')->group(function(){
        Route::get('/create', [StudentController::class, 'showCreate'])->name('create');
        Route::post('/create', [StudentController::class, 'insertStudent'])->name('insert');
        Route::get('/edit/{id}', [StudentController::class, 'showEdit'])->name('edit');
        Route::patch('/edit/{id}', [StudentController::class, 'updateStudent'])->name('update');
        Route::delete('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete');

        Route::post('/score', [StudentScoreContoller::class, 'insert'])->name('score.insert');
        Route::get('/score/{id}/edit', [StudentScoreContoller::class, 'edit'])->name('score.edit');
        Route::patch('/score/{id}', [StudentScoreContoller::class, 'update'])->name('score.update');
        Route::delete('/score/{id}', [StudentScoreContoller::class, 'delete'])->name('score.delete');

        Route::post('/predict/{id}', [StudentController::class, 'predictScore'])->name('predict');
        Route::get('{id}', [StudentController::class, 'detail'])->name('detail');
    });
});

Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

#WAJIB PAKE CONTROLLER SEMUA GABISA LANGSUNG VIEW KAYA DIATAS
Route::get('/about', [AboutController::class, 'index'])->name('about.view');