<?php

use App\Http\Controllers\Mely\EmailController;
use App\Http\Controllers\Mely\MaterialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mely\AdminController;
use App\Http\Controllers\Mely\AgendaController;
use App\Http\Controllers\Mely\MeetingRequestController;
use App\Http\Controllers\Mely\Mely\AttendanceListController;
use App\Http\Controllers\Mely\Mely\DocMinuteController;
use App\Http\Controllers\Mely\Mely\DocumentationMinuteController;
use App\Http\Controllers\Mely\Mely\IntegratedCalendarController;
use App\Http\Controllers\Mely\Mely\MeetingParticipantController;
use App\Http\Controllers\Mely\Mely\SubmissionModuleController;
use App\Http\Controllers\Mely\TopicController;
use App\Http\Controllers\Mely\MinuteController;
use App\Http\Controllers\Mely\PollingController;
use App\Http\Controllers\Mely\PollingDetailController;
use App\Http\Controllers\Mely\PresenceController;
use App\Http\Controllers\Mely\Mely\PDFController;
use App\Mail\Email;
use App\Models\MeetingParticipant;
use Illuminate\Support\Facades\Mail;

Route::middleware('auth')->group(function () {
    // Route::group(['middleware' => ['isDirector']], function() {
        // });
    Route::resource('admins', AdminController::class); 

    Route::resource('meeting-requests', MeetingRequestController::class);
    Route::get('meeting-requests/{id}/details', [MeetingRequestController::class, 'details'])->name('meeting-requests.details');
    Route::put('meeting-requests/{id}/update-status', [MeetingRequestController::class, 'updateStatus'])->name('meeting-requests.update-status');
    
    Route::resource('topics', TopicController::class);
    Route::get('topics/{id}/details', [TopicController::class, 'details'])->name('topics.details');
    Route::put('topics/{id}/update-status', [TopicController::class, 'updateStatus'])->name('topics.update-status');
    
    Route::resource('agendas', AgendaController::class);
    Route::get('agendas/{id}/details', [AgendaController::class, 'details'])->name('agendas.details');
    Route::put('agendas/{id}/update-status', [AgendaController::class, 'updateStatus'])->name('agendas.update-status');
    Route::post('agendas/store-initial-absen-at', [AgendaController::class, 'storeInitialAbsenAt'])->name('agendas.store-initial-absen-at');
    Route::put('agendas/{id}/update-final-absen-at', [AgendaController::class, 'updateFinalAbsenAt'])->name('agendas.update-final-absen-at');
    Route::get('/agendas/{id}/attendance-confirmation', [AgendaController::class, 'attendanceConfirmation'])->name('agendas.attendance-confirmation');
    
    Route::resource('materials', MaterialController::class);
    Route::get('materials/{id}/details', [MaterialController::class, 'details'])->name('materials.details');
    Route::put('materials/{id}/update-status', [MaterialController::class, 'updateStatus'])->name('materials.update-status');
    
    Route::resource('minutes', MinuteController::class);
    Route::get('minutes/{id}/details', [MinuteController::class, 'details'])->name('minutes.details');
    Route::get('minutes/{id}/presence-details', [MinuteController::class, 'presenceDetails'])->name('minutes.presence-details');
    Route::put('minutes/{id}/update-status', [MinuteController::class, 'updateStatus'])->name('minutes.update-status');
    
    Route::resource('presences', PresenceController::class);
    Route::get('presences/{id}/details', [PresenceController::class, 'details'])->name('presences.details');
    
    Route::resource('pollings', PollingController::class);
    Route::get('pollings/{id}/show-polling', [PollingController::class, 'showPolling'])->name('pollings.show-polling');
    Route::get('pollings/{id}/show-chart', [PollingController::class, 'showChart'])->name('pollings.show-chart');
    Route::put('pollings/{id}/update-status', [PollingController::class, 'updateStatus'])->name('pollings.update-status');
    
    Route::resource('polling-details', PollingDetailController::class);
    
    // TA
    
    Route::resource('submission-modules', SubmissionModuleController::class);
    Route::get('submission-modules/{id}/details', [SubmissionModuleController::class, 'details'])->name('submission-modules.details');
    Route::put('submission-modules/{id}/update-status', [SubmissionModuleController::class, 'updateStatus'])->name('submission-modules.update-status');
    Route::get('/submission-modules/{id}/attendance-confirmation', [SubmissionModuleController::class, 'attendanceConfirmation'])->name('submission-modules.attendance-confirmation');
    
    Route::resource('integrated-calendars', IntegratedCalendarController::class);
    
    Route::resource('attendance-lists', AttendanceListController::class);
    Route::get('attendance-lists/{id}/details', [AttendanceListController::class, 'details'])->name('attendance-lists.details');
    
    Route::resource('doc-minutes', DocMinuteController::class);
    Route::get('doc-minutes/{id}/details', [DocMinuteController::class, 'details'])->name('doc-minutes.details');
    Route::get('doc-minutes/{id}/generate-pdf', [DocMinuteController::class, 'generatePDF'])->name('doc-minutes.generate-pdf');
    Route::put('doc-minutes/{id}/update-status', [DocMinuteController::class, 'updateStatus'])->name('doc-minutes.update-status');
    
    Route::resource('meeting-participants', MeetingParticipant::class);
    Route::put('meeting-participants/{id}/update-initial-absen-at', [MeetingParticipantController::class, 'updateInitialAbsenAt'])->name('meeting-participants.update-initial-absen-at');
    Route::put('meeting-participants/{id}/update-final-absen-at', [MeetingParticipantController::class, 'updateFinalAbsenAt'])->name('meeting-participants.update-final-absen-at');
    
});

Route::get('/asd', function () {
    return view('mely.mely.meeting.email.status-changed');
});
