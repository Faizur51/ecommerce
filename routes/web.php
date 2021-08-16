<?php


use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\Frontend\SiteController;
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

Route::get('/',[SiteController::class,'index'])->name('index');


/*Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::prefix('admin')->middleware(['auth','isActive'])->name('admin.')->group(function (){

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::resource('user',UserController::class)->middleware('superAdmin');
Route::resource('userrole',UserRoleController::class)->middleware('superAdmin');

Route::resource('brand',UserRoleController::class)->middleware('admin');

});

require __DIR__.'/auth.php';
