<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sholikin\Holiday\HolidayController;
use App\Http\Controllers\Sholikin\Admin\Schedule\AdminScheduleController;
use App\Http\Controllers\Sholikin\Employee\Absensi\UserAbsensiController;
use App\Http\Controllers\Sholikin\Employee\Schedule\UserScheduleController;
use App\Http\Controllers\Sholikin\Admin\Schedule\AdminEmployeeScheduleController;
use App\Http\Controllers\Sholikin\Employee\Pengajuan\UserPengajuanController;
use App\Http\Controllers\Sholikin\Admin\Pengajuan\AdminPengajuanController;
use App\Http\Controllers\Sholikin\Admin\JobDescription\AdminJobDescriptionController;
use App\Http\Controllers\Sholikin\Employee\JobDescription\UserJobDescriptionController;
use App\Http\Controllers\Sholikin\Admin\JobDescription\AdminVerifyJobDescriptionController;
use App\Http\Controllers\Sholikin\Admin\Absensi\AdminAbsensiController;
use App\Http\Controllers\Sholikin\Admin\KPI\AdminKPIController;

Route::middleware('auth')->group(function () {
    Route::get('getHolidays', [HolidayController::class, 'getHolidays']);

    Route::group(['middleware' => ['NotEmployee']], function() {
        Route::resource('schedule', AdminScheduleController::class);
        Route::post('get-position-for-schedule', [AdminScheduleController::class, 'getPositionForSchedule']);
        Route::resource('employee-schedule', AdminEmployeeScheduleController::class);

        Route::get('get-schedule', [AdminEmployeeScheduleController::class, 'getSchedule'])->name('get-schedule');
        Route::get('detail-schedule/{id}', [AdminScheduleController::class, 'detail'])->name('detail-schedule');
        Route::get('get-schedule-detail', [AdminEmployeeScheduleController::class, 'getScheduleDetail'])->name('get-schedule-detail');
        Route::get('get-employee', [AdminEmployeeScheduleController::class, 'getEmployee'])->name('get-employee');

        Route::resource('job-description', AdminJobDescriptionController::class);
        Route::resource('verify-job-description', AdminVerifyJobDescriptionController::class);
        Route::get('admin-download-tugas-upload/{id}', [AdminVerifyJobDescriptionController::class, 'downloadFiles']);

        Route::get('attendance-report', [AdminAbsensiController::class, 'index']);

        Route::get('kpi-attendance', [AdminKPIController::class, 'attendance']);
        Route::get('kpi-job-description', [AdminKPIController::class, 'jobDescription']);

        Route::resource('submission', AdminPengajuanController::class);

        //export excel
        Route::get('excelAdminSchedule', [AdminScheduleController::class, 'excelAdminSchedule'])->name('excelAdminSchedule');
    });

    Route::group(['middleware' => ['isEmployee']], function() {
        Route::resource('user-schedule', UserScheduleController::class);
        Route::get('user-absensi', [UserAbsensiController::class, 'index']);
        Route::post('user-absensi-masuk', [UserAbsensiController::class, 'absenMasuk']);
        Route::post('user-absensi-pulang', [UserAbsensiController::class, 'absenPulang']);
        Route::get('cek-absensi-masuk', [UserAbsensiController::class, 'cekAbsensiMasuk']);
        Route::get('cek-absensi-pulang', [UserAbsensiController::class, 'cekAbsensiPulang']);
        Route::get('user-attendance-report', [UserAbsensiController::class, 'laporanAbsensi']);

        Route::get('user-job-description', [UserJobDescriptionController::class, 'jobDesc']);
        Route::resource('user-upload-job-description', UserJobDescriptionController::class);
        Route::post('uploadTugas', [UserJobDescriptionController::class, 'uploadTugas']);
        Route::get('download-tugas-upload/{id}', [UserJobDescriptionController::class, 'downloadFiles']);

        Route::resource('user-submission', UserPengajuanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::post('uploadPengajuan', [UserPengajuanController::class, 'uploadPengajuan']);
    });
});