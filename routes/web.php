<?php

use App\Http\Controllers\GuitarsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index'); // named home.* because of Controller name
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

// Add all method inside controller as Routes
Route::resource('guitars', GuitarsController::class);

Route::get('/store/{category?}/{item?}', function ($category = null, $item = null) {
    if (isset($category)) {
        if (isset($item)) {
            return "You are viewing store for $category for $item";
        }

        return "You are viewing store for $category";
    }

    return 'You are viewing all instruments';
});

// Route::get('/store', function() {
//     $category = request('category');

//     if (isset($category)) {
//         return 'You are viewing store for ' . strip_tags($category);
//     }

//     return 'You are viewing all instruments';
// });
