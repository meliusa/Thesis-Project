<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yusyac\PengaduanController;
use App\Http\Controllers\Yusyac\PengaduanAdminController;
use App\Http\Controllers\Yusyac\PengaduanDiProsesController;

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => ['isEmployee']], function() {
        Route::resource('pengaduan', PengaduanController::class);
        Route::post('pengaduan/store-image', [PengaduanController::class, 'storeImage'])->name('pengaduan.storeImage');
    });

    Route::group(['middleware' => ['NotEmployee']], function() {
        Route::resource('pengaduan-admin', PengaduanAdminController::class);
        Route::get('update-status-pengaduan-admin',[PengaduanAdminController::class,'updateStatus']);
        // Route::post('pengaduan/store-image', [PengaduanController::class, 'storeImage'])->name('pengaduan.storeImage');
        Route::resource('pengaduan-admin-diproses', PengaduanDiProsesController::class);
        Route::get('update-status-diproses-admin',[PengaduanDiProsesController::class,'updateStatus']);
    });

});