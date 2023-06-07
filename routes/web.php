<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Visitor\VisitorController;
use Illuminate\Foundation\Application;
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

Route::as('web.')
    ->controller(AuthController::class)
    ->middleware('guest')
    ->group(function() {
        Route::get('/login', 'index')->name('login');
        Route::post('/handle-login', 'store')->name('handle.login');
});

Route::as('web.visitors.')
    ->controller(VisitorController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/count/{id}', 'countVisitor')->name('count-visitor');
        Route::get('/', 'index')->name('index');
});