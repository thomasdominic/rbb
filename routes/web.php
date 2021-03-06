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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::mediaLibrary();

Route::get('players/{player}',[\App\Http\Controllers\Website\PlayerController::class,'show'])->name('players.show');
Route::get('players',[\App\Http\Controllers\Website\PlayerController::class,'index'])->name('players.index');

Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/teams', \App\Http\Livewire\Admin\Teams\TeamTable::class)->name('teams.index');
});
Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/teams/create', \App\Http\Livewire\Admin\Teams\TeamForm::class)->name('teams.create');
    Route::get('/teams/{id}/edit', \App\Http\Livewire\Admin\Teams\TeamForm::class)->name('teams.edit');
});

Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/positions', \App\Http\Livewire\Admin\Positions\PositionTable::class)->name('positions.index');
});
Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/positions/create', \App\Http\Livewire\Admin\Positions\PositionForm::class)->name('positions.create');
    Route::get('/positions/{id}/edit', \App\Http\Livewire\Admin\Positions\PositionForm::class)->name('positions.edit');
});

Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/regions', \App\Http\Livewire\Admin\Regions\RegionTable::class)->name('regions.index');
});
Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/regions/create', \App\Http\Livewire\Admin\Regions\RegionForm::class)->name('regions.create');
    Route::get('/regions/{id}/edit', \App\Http\Livewire\Admin\Regions\RegionForm::class)->name('regions.edit');
});

Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/clubs', \App\Http\Livewire\Admin\Clubs\ClubTable::class)->name('clubs.index');
});
Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/clubs/create', \App\Http\Livewire\Admin\Clubs\ClubForm::class)->name('clubs.create');
    Route::get('/clubs/{id}/edit', \App\Http\Livewire\Admin\Clubs\ClubForm::class)->name('clubs.edit');
});

Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/players', \App\Http\Livewire\Admin\Players\PlayerTable::class)->name('players.index');
});
Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/players/create', \App\Http\Livewire\Admin\Players\PlayerForm::class)->name('players.create');
    Route::get('/players/{id}/edit', \App\Http\Livewire\Admin\Players\PlayerForm::class)->name('players.edit');
});


Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/seasons', \App\Http\Livewire\Admin\Seasons\SeasonTable::class)->name('seasons.index');
});
Route::name(config('codenco-faster.back_prefix_name'))->prefix(config('codenco-faster.back_prefix_path'))->middleware(['auth'])->group(function (){
    Route::get('/seasons/create', \App\Http\Livewire\Admin\Seasons\SeasonForm::class)->name('seasons.create');
    Route::get('/seasons/{id}/edit', \App\Http\Livewire\Admin\Seasons\SeasonForm::class)->name('seasons.edit');
});


