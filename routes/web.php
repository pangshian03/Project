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
});
Route::get('/insertPatient', function () {
    return view('insertPatient');
});

Route::get('/insertPatient', [App\Http\Controllers\PatientController::class, 'index'])->name('insertPatient');

Route::post('/insertPatient/store', [App\Http\Controllers\PatientController::class, 'store'])->name('addPatient');

Route::get('/viewPatient',[App\Http\Controllers\PatientController::class, 'view'])->name('viewPatient'); 

Route::get('/deletePatient/{icNo}',[App\Http\Controllers\PatientController::class, 'delete'])->name('deletePatient');

Route::get('/editPatient/{icNo}',[App\Http\Controllers\PatientController::class, 'edit'])->name('editPatient');

Route::post('/updatePatient',[App\Http\Controllers\PatientController::class, 'update'])->name('updatePatient');

Route::get('/insertBed', function () {
    return view('insertBed',['icNo' => App\Models\Patient::all()]);
});

Route::post('/insertBed/store',[App\Http\Controllers\BedController::class, 'store'])->name('addBed');

Route::get('/viewBed',[App\Http\Controllers\BedController::class, 'view'])->name('viewBed');

Route::get('/deleteBed/{id}',[App\Http\Controllers\BedController::class, 'delete'])->name('deleteBed');

Route::get('/editBed/{icNo}',[App\Http\Controllers\BedController::class, 'edit'])->name('editBed');

Route::post('/updateBed',[App\Http\Controllers\BedController::class, 'update'])->name('updateBed');

Route::get('/makePayment', function () {
    return view('makePayment',['icNo' => App\Models\Patient::all()]);
});

Route::post('/makePayment/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('addPayment');

Route::get('/viewPayment',[App\Http\Controllers\PaymentController::class, 'view'])->name('viewPayment'); 

Route::get('/pay',[App\Http\Controllers\PaymentController::class, 'pay'])->name('pay'); 

Route::get('/delete.Record/{id}',[App\Http\Controllers\PaymentController::class, 'delete'])->name('delete.Record');

Route::post('/viewPatient',[App\Http\Controllers\PatientController::class, 'searchPatient'])->name('search.patient');

Route::post('\checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('insertBed', function()
{
    return view('insertBed',['icNo' => App\Models\Patient::all()]);
});

Route::get('makePayment', function()
{
    return view('makePayment',['icNo' => App\Models\Patient::all()]);
});

Route::get('Home', function()
{
    return view('welcome');
});

Route::get('/allPayment',[App\Http\Controllers\PaymentController::class, 'showAllPayment'])->name('allPayment');

Route::get('/paymentReport',[App\Http\Controllers\PaymentController::class, 'pdfReport'])->name('paymentReport');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
