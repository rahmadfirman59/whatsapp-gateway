<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[App\Http\Controllers\AuthControllerController::class,'login'])->name('login');
Route::post('login',[App\Http\Controllers\AuthControllerController::class,'doLogin'])->name('do.login');
Route::get('logout',[App\Http\Controllers\AuthControllerController::class,'logout'])->name('logout');


Route::get('dashboard',[App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard');

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\UsersController::class,'index'])->name('users');
    Route::get('/create',[App\Http\Controllers\UsersController::class,'create'])->name('users.create');
    Route::post('/store',[App\Http\Controllers\UsersController::class,'store'])->name('users.store');
    Route::get('/edit/{id}',[App\Http\Controllers\UsersController::class,'edit'])->name('users.edit');
    Route::post('/update/{id}',[App\Http\Controllers\UsersController::class,'update'])->name('users.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\UsersController::class,'delete'])->name('users.destroy');

});

Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\RolesController::class,'index'])->name('roles');
    Route::get('/create',[App\Http\Controllers\RolesController::class,'create'])->name('roles.create');
    Route::post('/store',[App\Http\Controllers\RolesController::class,'store'])->name('roles.store');
    Route::get('/edit/{id}',[App\Http\Controllers\RolesController::class,'edit'])->name('roles.edit');
    Route::post('/update/{id}',[App\Http\Controllers\RolesController::class,'update'])->name('roles.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\RolesController::class,'delete'])->name('roles.destroy');
});

Route::group(['prefix' => 'autoreplys', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\AutoReplysController::class,'index'])->name('autoreplys');
    Route::get('/create',[App\Http\Controllers\AutoReplysController::class,'create'])->name('autoreplys.create');
    Route::post('/store',[App\Http\Controllers\AutoReplysController::class,'store'])->name('autoreplys.store');
    Route::get('/edit/{id}',[App\Http\Controllers\AutoReplysController::class,'edit'])->name('autoreplys.edit');
    Route::post('/update/{id}',[App\Http\Controllers\AutoReplysController::class,'update'])->name('autoreplys.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\AutoReplysController::class,'delete'])->name('autoreplys.destroy');
});

Route::group(['prefix' => 'phonebooks', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\PhonebookController::class,'index'])->name('phonebooks');
    Route::get('/create',[App\Http\Controllers\PhonebookController::class,'create'])->name('phonebooks.create');
    Route::post('/store',[App\Http\Controllers\PhonebookController::class,'store'])->name('phonebooks.store');
    Route::get('/edit/{id}',[App\Http\Controllers\PhonebookController::class,'edit'])->name('phonebooks.edit');
    Route::post('/update/{id}',[App\Http\Controllers\PhonebookController::class,'update'])->name('phonebooks.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\PhonebookController::class,'delete'])->name('phonebooks.destroy');
});

Route::group(['prefix' => 'devices', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\DevicesController::class,'index'])->name('devices');
    Route::get('/create',[App\Http\Controllers\DevicesController::class,'create'])->name('devices.create');
    Route::post('/store',[App\Http\Controllers\DevicesController::class,'store'])->name('devices.store');
    Route::get('/edit/{id}',[App\Http\Controllers\DevicesController::class,'edit'])->name('devices.edit');
    Route::post('/update/{id}',[App\Http\Controllers\DevicesController::class,'update'])->name('devices.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\DevicesController::class,'delete'])->name('devices.destroy');
    Route::get('/remove',[App\Http\Controllers\DevicesController::class,'remove'])->name('devices.remove');
});

Route::group(['prefix' => 'blast-pesan', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\BlastPesanController::class,'index'])->name('blast-pesan');
    Route::get('/create',[App\Http\Controllers\BlastPesanController::class,'create'])->name('blast-pesan.create');
    Route::post('/store',[App\Http\Controllers\BlastPesanController::class,'store'])->name('blast-pesan.store');
    Route::get('/edit/{id}',[App\Http\Controllers\BlastPesanController::class,'edit'])->name('blast-pesan.edit');
    Route::post('/update/{id}',[App\Http\Controllers\BlastPesanController::class,'update'])->name('blast-pesan.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\BlastPesanController::class,'delete'])->name('blast-pesan.destroy');
    Route::post('/import',[App\Http\Controllers\BlastPesanController::class,'import'])->name('blast-pesan.import');
    Route::get('/process',[App\Http\Controllers\BlastPesanController::class,'process'])->name('blast-pesan.process');
});

Route::group(['prefix' => 'riwayat-pesan', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\RiwayatPesanController::class,'index'])->name('riwayat-pesan');
    Route::get('/create',[App\Http\Controllers\RiwayatPesanController::class,'create'])->name('riwayat-pesan.create');
    Route::post('/store',[App\Http\Controllers\RiwayatPesanController::class,'store'])->name('riwayat-pesan.store');
    Route::get('/edit/{id}',[App\Http\Controllers\RiwayatPesanController::class,'edit'])->name('riwayat-pesan.edit');
    Route::post('/update/{id}',[App\Http\Controllers\RiwayatPesanController::class,'update'])->name('riwayat-pesan.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\RiwayatPesanController::class,'delete'])->name('riwayat-pesan.destroy');
    Route::get('/remove',[App\Http\Controllers\RiwayatPesanController::class,'remove'])->name('riwayat-pesan.remove');
});


Route::group(['prefix' => 'pesan-satuan', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\PesanSatuanController::class,'index'])->name('pesan-satuan');
    Route::get('/create',[App\Http\Controllers\PesanSatuanController::class,'create'])->name('pesan-satuan.create');
    Route::post('/store',[App\Http\Controllers\PesanSatuanController::class,'store'])->name('pesan-satuan.store');
    Route::get('/edit/{id}',[App\Http\Controllers\PesanSatuanController::class,'edit'])->name('pesan-satuan.edit');
    Route::post('/update/{id}',[App\Http\Controllers\PesanSatuanController::class,'update'])->name('pesan-satuan.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\PesanSatuanController::class,'delete'])->name('pesan-satuan.destroy');
    Route::post('/import',[App\Http\Controllers\PesanSatuanController::class,'import'])->name('pesan-satuan.import');
    Route::get('/process',[App\Http\Controllers\PesanSatuanController::class,'process'])->name('pesan-satuan.process');
});
