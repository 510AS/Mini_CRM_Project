<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes(['register' => false]);

 Route::middleware(['guest'])->group(function () {

    Route::get('/', function () {

        return view('auth.login');

    });

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        Route::group(['namespace'=>'company'],function(){

            Route::resource('companies','CompanyController');
        });

        Route::group(['namespace'=>'employer'],function(){
            Route::resource('employees','ContactPersoneController');
        });

                /**
         * Logout Route
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    });




