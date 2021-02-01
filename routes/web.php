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
    return view('welcome');
});
$groupData = [
    'namespace' => 'App\Http\Controllers\Shop',
    'prefix' => 'shop',
];
Route::group($groupData, function () {
    Route::resource('search', SearchController::class)
        ->only(['index', 'edit'])
        ->names('shop.search');
});

Auth::routes();

Route::post('/shop/searchcrosses', [App\Http\Controllers\Shop\SearchController::class, 'searchCrosses'])->name('shop.search.crosses');
Route::get('shop/searchautopart/{numb}', [App\Http\Controllers\Shop\SearchController::class, 'searchAutopart'])->name('shop.search.autopart');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
