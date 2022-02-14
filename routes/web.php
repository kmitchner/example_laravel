<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\PostController;

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
    return view('landing');
});

Route::controller(PostController::class)->group(function() {
    Route::get('/list', 'list')->middleware(['auth'])->name('list');
    Route::get('/delete/{post_id}', 'delete')->middleware(['auth']);
    Route::get('/create', 'create')->middleware(['auth'])->name('create');
    Route::post('/create', 'insert')->middleware(['auth']);
    Route::get('/edit/{post_id}', 'edit')->middleware(['auth'])->name('edit');
    Route::post('/edit', 'update')->middleware(['auth']);
});

require __DIR__.'/auth.php';
