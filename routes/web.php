<?php

use App\Http\Controllers\dashboard\AdminListController;
use App\Http\Controllers\dashboard\DriverListController;
use App\Http\Controllers\dashboard\StatisticsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('dashboard')->group(function(){
    Route::get('/',[StatisticsController::class,'get'])->name('statistics.dashboard');
    Route::get('/maledriver',[DriverListController::class , 'index'])->name('driver.male');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/adminlist',[AdminListController::class ,'index'])->name('admin.list');
Route::post('/dashboard/adminlist/register',[AdminListController::class ,'register'])->name('admin.list.register');
Route::get('/dashboard/adminlist/{id}', [AdminListController::class, 'destroy'])->name('delete.user');

require __DIR__.'/auth.php';
