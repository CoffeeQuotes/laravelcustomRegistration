<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
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
    $employees = User::latest()->paginate(5);
    return view('dashboard', compact('employees'));
})->middleware(['auth'])->name('dashboard');
Route::resource('users', RegisteredUserController::class);
require __DIR__.'/auth.php';
