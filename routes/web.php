<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\ViviendaController;
use App\Http\Livewire\Admin\CuentaIndex;
use App\Http\Livewire\Admin\CuentaShow;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('inicio', [SitioController::class, 'landing']);

Route::resource('vivienda', ViviendaController::class)->middleware('auth');
Route::resource('vecinos', PersonaController::class)->middleware('auth')->parameters(['vecinos' => 'persona']);
Route::get('/admin/cuentas', CuentaIndex::class)->name('cuenta.index');
Route::get('/admin/cuentas/{cuenta}', CuentaShow::class)->name('cuenta.show');
