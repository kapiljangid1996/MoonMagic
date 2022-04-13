<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\User\UserController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//Front User Routing
Route::group(['middleware' => ['auth', 'user', 'PreventBackHistory'], 'prefix' => 'user'], function () {

    //User Dashboard
    Route::get('/dashboard', [UserController::class, 'index'])->name('front.user.dashboard');

    //User Logout
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

//Admin User Routing
Route::group(['middleware' => ['auth', 'admin', 'PreventBackHistory'], 'prefix' => 'admin'], function () {

    //Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //Admin Logout
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    //Edit Profile
    Route::get('/profile-edit', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile-edit', [AdminController::class, 'profileEdit'])->name('admin.edit.profile');

    //Slider Manager
    Route::resource('sliders', App\Http\Controllers\Admin\SlidersController::class); 
    Route::get('/sliders/delete/{id}', [App\Http\Controllers\Admin\SlidersController::class, 'destroy']);

    //Menu Manager
    Route::get('/menu-builder', [MenusController::class, 'index'])->name('menu-builder.index');
    Route::post('/menu-builder', [MenusController::class, 'store'])->name('menu-builder.store');
    Route::post('/editMenuType', [MenusController::class, 'update'])->name('menu-builder.update');
    Route::get('/menu-builder/delete/{id}', [MenusController::class, 'destroy'])->name('menu-builder.destroy');
    Route::get('/menu-builder/manage-menu/{id}', [MenusController::class, 'show'])->name('menu-builder.show');
    Route::post('/menu/ajaxGetMenuLinks', [MenusController::class, 'ajaxGetMenuLinks']);    
    Route::post('/menu/save_menu_links', [MenusController::class, 'save_menu_links']);   
    Route::post('/menu/ajaxSaveMenuStructure', [MenusController::class, 'ajaxSaveMenuStructure']);  
    Route::post('/menu/ajaxDeleteMenuPage', [MenusController::class, 'ajaxDeleteMenuPage']);    
    Route::post('/menu/ajaxMenuPageDetail', [MenusController::class, 'ajaxMenuPageDetail']);    
    Route::post('/menu/ajaxEditMenuPage', [MenusController::class, 'ajaxEditMenuPage']);
});
