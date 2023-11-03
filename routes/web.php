<?php

use App\Models\Larablog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LarablogController;

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
    return view('welcome',);
});



Route::get('/dashboard', function () {
    return view('dashboard', [
        'blogs'=> Larablog::with('user')->latest()->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('larablogs', LarablogController::class)
->only(['index','store','edit','update','show','destroy'])
->middleware(['auth','verified']);

// Route::get('myblogs', function(){
//     return view('larablogs.myblogs', [
//         'blogs'=> Larablog::with('user')->latest()->get(),
//     ]);
// })->name('larablogs.myblogs');

Route::get('myblogs', function(){
    $user = Auth::user();
    
    $blogs = Larablog::where('user_id', $user->id)
        ->with('user')
        ->latest()
        ->get();

    return view('larablogs.myblogs', compact('blogs'));
})->middleware('auth')->name('larablogs.myblogs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
