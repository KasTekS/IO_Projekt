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



Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);



Route::get('/admin/users/', [\App\Http\Controllers\Admin\UsersControler::class, 'index'])->name('userlist')->middleware('can:isAdmin');
Route::get('admin/users/edit/{user}', [\App\Http\Controllers\Admin\UsersControler::class, 'editadmin'])->name('users.editadmin')->middleware('can:isAdmin');

Route::post('admin/users/{user}/update', [App\Http\Controllers\Admin\UsersControler::class, 'updateadmin'])->name('admin.user.update')->middleware('can:isAdmin');

Route::delete('/admin/users/{user}', [\App\Http\Controllers\Admin\UsersControler::class, 'destroy'])->name('user.destroy')->middleware('can:isAdmin');

Route::get('/admin/sale', [\App\Http\Controllers\SalaController::class, 'index'])->middleware('can:isAdmin')->name('sala');;
Route::get('admin/sale/create', [\App\Http\Controllers\SalaController::class, 'create'])->name('sale.create')->middleware('can:isAdmin');
Route::post('admin/sale/store', [\App\Http\Controllers\SalaController::class, 'store'])->name('sale.store')->middleware('can:isAdmin');
Route::get('admin/sale/{sala}/edit', [\App\Http\Controllers\SalaController::class, 'edit'])->name('sale.edit')->middleware('can:isAdmin');
Route::post('admin/sale/{sala}/update', [\App\Http\Controllers\SalaController::class, 'update'])->name('sale.update')->middleware('can:isAdmin');
Route::delete('admin/sale/{sala}', [\App\Http\Controllers\SalaController::class, 'destroy'])->name('sale.destroy')->middleware('can:isAdmin');

Route::get('/admin/sale/miejsca/show/{sala}/', [\App\Http\Controllers\MiejscaController::class, 'show'])->middleware('can:isAdmin')->name('sala.miejsca');
Route::get('/admin/sale/miejsca/{sala}', [\App\Http\Controllers\MiejscaController::class, 'index'])->middleware('can:isAdmin')->name('sale.miejsca.index');
Route::get('admin/sale/miejsca/edit/{miejsce}', [\App\Http\Controllers\MiejscaController::class, 'edit'])->name('miejsca.edit')->middleware('can:isAdmin');
Route::post('admin/sale/miejsca/{miejsce}/update', [\App\Http\Controllers\MiejscaController::class, 'update'])->name('miejsca.update')->middleware('can:isAdmin');
Route::get('admin/sale/miejsca/create/add', [\App\Http\Controllers\MiejscaController::class, 'create'])->name('miejsca.create')->middleware('can:isAdmin');
Route::post('admin/sale/miejsca/create/addd', [\App\Http\Controllers\MiejscaController::class, 'dodaj'])->name('miejsca.dodaj')->middleware('can:isAdmin');
Route::post('admin/sale/miejsca/store', [\App\Http\Controllers\MiejscaController::class, 'store'])->name('miejsca.store')->middleware('can:isAdmin');
Route::delete('admin/sale/miejsca/{miejsce}', [\App\Http\Controllers\MiejscaController::class, 'destroy'])->name('miejsca.destroy')->middleware('can:isAdmin');


Route::get('/admin/cennik', [\App\Http\Controllers\CennikController::class, 'index'])->middleware('can:isAdmin')->name('ceenikedit');;
Route::get('admin/cennik/create', [\App\Http\Controllers\CennikController::class, 'create'])->name('cennik.create')->middleware('can:isAdmin');
Route::post('admin/cennik/store', [\App\Http\Controllers\CennikController::class, 'store'])->name('cennik.store')->middleware('can:isAdmin');
Route::get('admin/cennik/{cena}/edit', [\App\Http\Controllers\CennikController::class, 'edit'])->name('cennik.edit')->middleware('can:isAdmin');
Route::post('admin/cennik/{cena}/update', [\App\Http\Controllers\CennikController::class, 'update'])->name('cennik.update')->middleware('can:isAdmin');
Route::delete('admin/cennik/{cena}', [\App\Http\Controllers\CennikController::class, 'destroy'])->name('cennik.destroy')->middleware('can:isAdmin');

Route::get('/admin/film', [\App\Http\Controllers\FilmController::class, 'index'])->middleware('can:isAdmin')->name('film');;
Route::get('admin/film/create', [\App\Http\Controllers\FilmController::class, 'create'])->name('film.create')->middleware('can:isAdmin');
Route::post('admin/film/store', [\App\Http\Controllers\FilmController::class, 'store'])->name('film.store')->middleware('can:isAdmin');
Route::get('admin/film/{film}/edit', [\App\Http\Controllers\FilmController::class, 'edit'])->name('film.edit')->middleware('can:isAdmin');
Route::post('admin/film/{film}/update', [\App\Http\Controllers\FilmController::class, 'update'])->name('film.update')->middleware('can:isAdmin');
Route::delete('admin/film/{film}', [\App\Http\Controllers\FilmController::class, 'destroy'])->name('film.destroy')->middleware('can:isAdmin');

Route::get('/admin/seans', [\App\Http\Controllers\SeansController::class, 'index'])->middleware('can:isAdmin')->name('seans');;
Route::get('admin/seans/create', [\App\Http\Controllers\SeansController::class, 'create'])->name('seans.create')->middleware('can:isAdmin');
Route::post('admin/seans/store', [\App\Http\Controllers\SeansController::class, 'store'])->name('seans.store')->middleware('can:isAdmin');
Route::get('admin/seans/{seans}/edit', [\App\Http\Controllers\SeansController::class, 'edit'])->name('seans.edit')->middleware('can:isAdmin');
Route::post('admin/seans/{seans}/update', [\App\Http\Controllers\SeansController::class, 'update'])->name('seans.update')->middleware('can:isAdmin');
Route::delete('admin/seans/{seans}', [\App\Http\Controllers\SeansController::class, 'destroy'])->name('seans.destroy')->middleware('can:isAdmin');

Route::get('/home/bilety', [\App\Http\Controllers\BiletyController::class, 'show'])->middleware('auth')->name('bilety.show');

Route::get('/admin/bilety', [\App\Http\Controllers\BiletyController::class, 'index'])->middleware('can:isAdmin')->name('bilety');;
Route::get('admin/bilety/create', [\App\Http\Controllers\BiletyController::class, 'create'])->name('bilety.create')->middleware('can:isAdmin');
Route::post('admin/bilety/store', [\App\Http\Controllers\BiletyController::class, 'storee'])->name('bilety.store')->middleware('can:isAdmin');
Route::get('admin/bilety/{bilet}/edit', [\App\Http\Controllers\BiletyController::class, 'edit'])->name('bilety.edit')->middleware('can:isAdmin');
Route::post('admin/bilety/{bilet}/update', [\App\Http\Controllers\BiletyController::class, 'update'])->name('bilety.update')->middleware('can:isAdmin');
Route::delete('admin/bilety/{bilet}', [\App\Http\Controllers\BiletyController::class, 'destroy'])->name('bilety.destroy')->middleware('can:isAdmin');


Route::get('/zakup/film/{film}', [\App\Http\Controllers\ZakupyController::class, 'film'])->name('zakupy.film');;


Route::get('/kino/repertuar', [App\Http\Controllers\RepertuarControler::class, 'index'])->name('repertuar');
Route::get('/kino/repertuar/zakupy/{seans}', [App\Http\Controllers\ZakupyController::class, 'miejsca'])->name('kup.miejsce')->middleware('auth');;
Route::post('/kino/repertuar/zakupy/podsumowanie/{seans}', [App\Http\Controllers\ZakupyController::class, 'podsumowanie'])->name('kup.podsumowanie')->middleware('auth');;
Route::get('/kino/cennik',    [App\Http\Controllers\CennikController::class, 'show'])->name('cennik');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home/edit', [\App\Http\Controllers\Admin\UsersControler::class, 'edit'])->name('user.edit')->middleware('auth');

Route::post('/home/update{user}', [App\Http\Controllers\Admin\UsersControler::class, 'update'])->name('user.update')->middleware('auth');
Route::post('/kino/kupione', [\App\Http\Controllers\BiletyController::class, 'store'])->name('kup.bilety')->middleware('auth');


Route::post('admin/filmy/filtr', [\App\Http\Controllers\FilmController::class, 'filter'])->name('filmy.filter')->middleware('can:isAdmin');
Route::post('admin/users/filtr', [\App\Http\Controllers\Admin\UsersControler::class, 'filter'])->name('users.filter')->middleware('can:isAdmin');
Route::post('admin/seans/filtr', [\App\Http\Controllers\SeansController::class, 'filter'])->name('seans.filter')->middleware('can:isAdmin');
Route::post('admin/sale/filtr', [\App\Http\Controllers\SalaController::class, 'filter'])->name('sale.filter')->middleware('can:isAdmin');
Route::post('admin/bilety/filtr', [\App\Http\Controllers\BiletyController::class, 'filter'])->name('bilety.filter')->middleware('can:isAdmin');
Route::post('admin/cennik/filtr', [\App\Http\Controllers\CennikController::class, 'filter'])->name('cennik.filter')->middleware('can:isAdmin');
