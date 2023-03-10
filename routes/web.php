<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function() {
    // register routes
    // Route::get('/register', 'Auth\RegisterController@show')->name('register.show');
    // Route::post('/register', 'RegisterController@register')->name('register.perform');

    //login routes
    // Route::get('/login', 'LoginController@show')->name('login.show');
    // Route::post('/login', 'LoginController@login')->name('login.perform');

});

Route::group(['middleware' => ['auth', 'permission']], function() {
    //logout routes
    // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    //users routes


    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/create', 'UsersController@store')->name('users.store');
    Route::get('/{user}/show', 'UsersController@show')->name('users.show');
    Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
    Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
});

Route::group(['prefix' => 'products'], function() {
    Route::get('/', 'ProductsController@index')->name('products.index');
    Route::get('/create', 'ProductsController@create')->name('products.create');
    Route::post('/create', 'ProductsController@store')->name('products.store');
    Route::get('/{product}/show', 'ProductsController@show')->name('products.show');
    Route::get('/{product}/edit', 'ProductsController@edit')->name('products.edit');
    Route::patch('/{product}/update', 'ProductsController@update')->name('products.update');
    Route::delete('/{product}/delete', 'ProductsController@destroy')->name('products.destroy');
});

Route::group(['prefix' => 'brands'], function() {
    Route::get('/', 'BrandsController@index')->name('brands.index');
    Route::get('/create', 'BrandsController@create')->name('brands.create');
    Route::post('/create', 'BrandsController@store')->name('brands.store');
    Route::get('/{brand}/show', 'BrandsController@show')->name('brands.show');
    Route::get('/{brand}/edit', 'BrandsController@edit')->name('brands.edit');
    Route::patch('/{brand}/update', 'BrandsController@update')->name('brands.update');
    Route::delete('/{brand}/delete', 'BrandsController@destroy')->name('brands.destroy');
});


