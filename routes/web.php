<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {

    $user = auth()->user();

    return view('dashboard', [
        'tokens' => $user->tokens
    ]);

    // return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/token/create', [DashboardController::class, 'showTokenForm'])->name('token.showForm');
    Route::post('/token/create', [DashboardController::class, 'createToken'])->name('token.create');
    Route::post('/token/delete/{token}', [DashboardController::class, 'deleteToken'])->name('token.delete');
});


// Route::view('/{any}', 'dashboard')
//     ->middleware(['auth'])
//     ->where('any', '.*');

require __DIR__.'/auth.php';
