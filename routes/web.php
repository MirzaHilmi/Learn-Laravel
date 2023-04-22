<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

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

/*
| GET - Request a resource
| POST - Send or Create a new Resource
| PUT - Update a resource (change entire data of a record)
| PATCH - Modify a resource (change spesific data of a record)
| DELETE - Delete a resource
| OPTIONS - Ask the server which verbs are allowed
*/

// GET
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog.show')->whereNumber('id');

// POST
Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
Route::post('/blog', [PostController::class, 'store'])->name('blog.store');

// PUT or PATCH
Route::get('/blog/edit/{id}', [PostController::class, 'edit'])->name('blog.edit');
Route::patch('/blog/{id}', [PostController::class, 'update'])->name('blog.update');

// DELETE
Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');

// Multiple HTTP Request
// Route::match(['GET', 'POST'], '/blog', [PostController::class, 'index']);

// Route::resource('/blog', [PostController::class]);

// Route for invoke method
Route::get('/', HomeController::class);

// Any Incoming HTTP Request
// Route::any('/blog', [PostController::class, 'index']);

// Pass view without Controller
// Route::view('/blog', 'blog.index', ['name' => 'Hello there, this is a custom data']);

// Route::get('blog', [PostController::class, 'index']);
