<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProjectController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\admin\DesignController;
use App\Http\Controllers\Admin\DesignGalleryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectGalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailProjectController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('contact')
        ->group(function(){{
           Route::resource('contact', ContactController::class);
 
        }});
Route::get('/home/{id}', [HomeController::class, 'detail'])->name('categories-detail');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::get('/about', [AboutController::class, 'index'])->name('about-home');
Route::get('/about/{id}', [DetailProjectController::class, 'index'])->name('detail-project');


Route::prefix('admin')
        ->middleware(['auth','admin'])
        ->group(function(){{
            Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
            Route::resource('category', CategoryController::class);
            Route::resource('user', UserController::class);      
            Route::resource('design', DesignController::class);
            Route::resource('design-gallery', DesignGalleryController::class);
            Route::resource('category-project', CategoryProjectController::class);
            Route::resource('project', ProjectController::class);
            Route::resource('project-gallery', ProjectGalleryController::class);
            Route::resource('contact-admin', ContactAdminController::class);
        }});

Auth::routes();


