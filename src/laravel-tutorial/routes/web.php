<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where yopbu can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('contacts', [ ContactFormController::class, 'index'])->name('contacts.index');
Route::prefix('contacts') // 先頭にcontactsをつける
    ->middleware(['auth']) // 認証機能
    ->name('contacts.') // ルート名
    ->controller(ContactFormController::class) // コントローラの指定
    ->group(function () { // グループ化
        Route::get('/', 'index')->name('index'); // 名前付きルート
    });

Route::get('/drill', function () {
    return view('drill');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
