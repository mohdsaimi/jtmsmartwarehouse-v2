<?php

use App\Http\Controllers\StokController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LokasistokController;
use App\Http\Controllers\SyssldController;
use App\Http\Controllers\Backend\DashboardController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('stok', [StokController::class, 'index'])->name('stok');


Route::group([
    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    Route::get('editstok/{stok}', [StokController::class, 'editstok'])->name('editstok');
    Route::patch('updatestok/{stok}', [StokController::class, 'updatestok'])->name('updatestok');
    Route::get('createstok', [StokController::class, 'createstok'])->name('createstok');
    Route::post('storestok', [StokController::class, 'storestok'])->name('storestok');
    Route::get('showstok/{stok}', [StokController::class, 'showstok'])->name('showstok');
    Route::delete('destroystok/{stok}', [StokController::class, 'destroystok'])->name('destroystok');

    Route::get('device', [DeviceController::class, 'index'])->name('device');
    Route::get('createdevice', [DeviceController::class, 'create'])->name('createdevice');
    Route::post('storedevice', [DeviceController::class, 'store'])->name('storedevice');
    Route::get('showdevice/{device}', [DeviceController::class, 'show'])->name('showdevice');
    Route::get('editdevice/{device}', [DeviceController::class, 'edit'])->name('editdevice');
    Route::patch('updatedevice/{device}', [DeviceController::class, 'update'])->name('updatedevice');
    Route::delete('destroydevice/{device}', [DeviceController::class, 'destroy'])->name('destroydevice');


});



Route::get('lokasistok', [LokasistokController::class, 'index'])->name('lokasistok');
Route::get('createlokasistok/{stok}', [LokasistokController::class, 'create'])->name('createlokasistok');
Route::post('createlokasistok', [LokasistokController::class, 'store'])->name('storelokasistok');
Route::get('editlokasistok/{lokasistok}', [LokasistokController::class, 'edit'])->name('editlokasistok');
Route::patch('updatelokasistok/{lokasistok}', [LokasistokController::class, 'update'])->name('updatelokasistok');
Route::delete('destroylokasistok/{lokasistok}', [LokasistokController::class, 'destroy'])->name('destroylokasistok');



Route::get('syssld', [SyssldController::class, 'index'])->name('syssld');
Route::get('createsyssld/{lokasistok}', [SyssldController::class, 'create'])->name('createsyssld');
Route::post('createsyssld', [SyssldController::class, 'store'])->name('storesyssld');
Route::get('editsyssld/{syssld}', [SyssldController::class, 'edit'])->name('editsyssld');
Route::patch('updatesyssld/{syssld}', [SyssldController::class, 'update'])->name('updatesyssld');
Route::delete('destroysyssld/{syssld}', [SyssldController::class, 'destroy'])->name('destroysyssld');

Route::resource('stoks', StokController::class);
Route::resource('devices', DeviceController::class);
Route::resource('lokasistoks', LokasistokController::class);
Route::resource('sysslds', SyssldController::class);
