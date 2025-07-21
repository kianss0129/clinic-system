<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Patient\PatientMedicalRecordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\PatientRegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\{
    AppointmentController,
    MedicalRecordController,
    PrescriptionController,
    BillingController,
    ReportController
};
use App\Http\Controllers\Patient\PatientAppointmentController;

/*
|----------------------------------------------------------------------
| Public Routes
|----------------------------------------------------------------------
*/

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

// Welcome page
Route::get('/', fn () => Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register.patient'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
]));

// Patient‑only registration (guest‑only)
Route::middleware('guest')->group(function () {
    Route::get('register/patient', [PatientRegisterController::class, 'create'])->name('register.patient');
    Route::post('register/patient', [PatientRegisterController::class, 'store']);
});

/*
|----------------------------------------------------------------------
| Email Verification Route
|----------------------------------------------------------------------
*/
Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

/*
|----------------------------------------------------------------------
| Authenticated Routes (Verified Only)
|----------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return match (auth()->user()->getRoleNames()->first()) {
            'Admin'       => Inertia::render('Dashboard/Admin'),
            'Doctor'      => Inertia::render('Dashboard/Doctor'),
            'Patient'     => Inertia::render('Dashboard/Patient'),
            'Super Admin' => Inertia::render('Dashboard/SuperAdmin'),
            default       => abort(403),
        };
    })->name('dashboard');

    // ✅ Admin and Super Admin Routes
    Route::middleware('role:Admin|Super Admin')->group(function () {
        Route::resources([
            '/appointments' => AppointmentController::class,
            '/medical-records' => MedicalRecordController::class,
            '/billing' => BillingController::class,
        ]);

        Route::post('/billing/{id}/status', [BillingController::class, 'updateStatus'])->name('billing.updateStatus');
        Route::get('/billing/pdf/export', [BillingController::class, 'exportPDF'])->name('billing.exportPDF');
       Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');
    Route::delete('/roles/{user}', [RoleController::class, 'remove'])->name('roles.remove');
    Route::delete('/billing/{billing}', [BillingController::class, 'destroy'])->name('billing.destroy');

    });

    // ✅ Doctor Routes
    Route::middleware('role:Doctor')->prefix('doctor')->name('doctor.')->group(function () {
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::post('/appointments/{id}/confirm', [AppointmentController::class, 'confirm'])->name('appointments.confirm');

        // Medical Records
        Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('records.index');
        Route::get('/medical-records/create', [MedicalRecordController::class, 'create'])->name('records.create');
        Route::post('/medical-records', [MedicalRecordController::class, 'store'])->name('records.store');
        Route::get('/medical-records/{medicalRecord}/edit', [MedicalRecordController::class, 'edit'])->name('records.edit');
        Route::put('/medical-records/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('records.update');

        // Prescriptions
        Route::prefix('prescriptions')->name('prescriptions.')->group(function () {
            Route::get('/', [PrescriptionController::class, 'index'])->name('index');
            Route::get('/create', [PrescriptionController::class, 'create'])->name('create');
            Route::get('/medical-records', [PatientMedicalRecordController::class, 'index'])->name('patient.medical-records');
            Route::post('/', [PrescriptionController::class, 'store'])->name('store');
        });
    });

    // ✅ Patient Routes
    Route::middleware('role:Patient')->prefix('patient')->name('patient.')->group(function () {
        Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('patient.medical-records');
        Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/appointments/create', [PatientAppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/appointments', [PatientAppointmentController::class, 'store'])->name('appointments.store');
        Route::post('/appointments/{appointment}/cancel', [PatientAppointmentController::class, 'cancel'])
            ->name('appointments.cancel');
        Route::get('/records', [MedicalRecordController::class, 'index'])->name('patient.records');
        //Route::get('/prescriptions', [PrescriptionController::class, 'patientPrescriptions'])->name('patient.prescriptions');
        Route::get('/billings', [BillingController::class, 'patientIndex'])->name('patient.billings');

        Route::get('/support', function () {
            return Inertia::render('Patient/Support');
        })->name('patient.support');    
        Route::get('/patient/prescriptions', [PrescriptionController::class, 'patientPrescriptions'])->name('patient.prescriptions');
    });

    // ✅ Billing Detail (Admin & Patient)
    Route::get('/admin/billing/{billing}', [BillingController::class, 'show'])
        ->name('billing.show')
        ->middleware('role:Admin|Super Admin');

    Route::get('/my-billings', [BillingController::class, 'patientIndex'])
        ->name('billing.patient.index')
        ->middleware('role:Patient');

    // ✅ PDF Report
    Route::get('/report/appointments/pdf', [ReportController::class, 'appointmentPDF'])->name('report.appointments.pdf');

    // ✅ Welcome screen after register
    Route::get('/welcome-after-register', fn () => Inertia::render('WelcomeAfterRegister'))
        ->name('welcome.after.register')
        ->middleware('auth');
});

// Auth routes (Jetstream/Breeze)
require __DIR__.'/auth.php';
