<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContractorController;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });

// website routes
Route::get('/', [TemplateController::class, 'index']);
//admin Panel Routes

Route::prefix('admin')->middleware(['auth','user-role:admin'])->group(function(){
    Route::get('dashboard',[App\Http\Controllers\AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('contractor',[App\Http\Controllers\ContractorController::class,'index'])->name('contractor.index');
    Route::get('contractor/create',[App\Http\Controllers\ContractorController::class,'create'])->name('contractor.create');
    Route::post('contractorstore',[App\Http\Controllers\ContractorController::class,'store'])->name('contractorstore');
    Route::get('contractoredit/{id}',[App\Http\Controllers\ContractorController::class,'edit'])->name('contractoredit');
    Route::post('contractorupdate/{id}',[App\Http\Controllers\ContractorController::class,'update'])->name('contractorupdate');

    Route::get('ContractorWork',[App\Http\Controllers\ContractWorkController::class,'index'])->name('work.index');
    Route::get('work/create',[App\Http\Controllers\ContractWorkController::class,'create'])->name('work.create');
    Route::post('workstore',[App\Http\Controllers\ContractWorkController::class,'store'])->name('workstore');
    Route::get('work/edit/{id}',[App\Http\Controllers\ContractWorkController::class,'edit'])->name('workedit');
    Route::post('work/update/{id}',[App\Http\Controllers\ContractWorkController::class,'update'])->name('workupdate');
    Route::get('work/delete/{id}',[App\Http\Controllers\ContractWorkController::class,'destroy'])->name('workdelete');
    Route::get('work/expired',[App\Http\Controllers\ContractWorkController::class,'warrantyExpired'])->name('work.expired');
});



// login Routes

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
