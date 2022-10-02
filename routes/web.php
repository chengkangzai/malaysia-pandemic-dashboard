<?php

use App\Http\Controllers\LocaleController;
use App\Http\Livewire\CovidVaccination\Vaccination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPandemicController;

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

Route::get('/locale/{locale}', [LocaleController::class, 'changeLocale'])->name('setLocale');

Route::group(['as' => 'pandemic.'], function () {
    Route::get('/', [PublicPandemicController::class, 'index'])->name('index');
    Route::get('clusters', [PublicPandemicController::class, 'clusters'])->name('clusters');
    Route::get('state', [PublicPandemicController::class, 'state'])->name('state');
    Route::get('vaccination', [PublicPandemicController::class, 'vaccination'])->name('vaccination');
});
