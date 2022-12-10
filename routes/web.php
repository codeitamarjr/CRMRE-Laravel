<?php

use App\Models\Listing;
use App\Models\Enquiries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\EmailTemplatesController;

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

// Common Resource Routes:
// GET /resource - index
// GET /resource/{id} - show
// GET /resource/create - create
// POST /resource - store
// GET /resource/{id}/edit - edit
// PUT/PATCH /resource/{id} - update
// DELETE /resource/{id} - destroy

// Home Page open dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Enquiries Routes
|--------------------------------------------------------------------------
*/
Route::get('/enquiries', [EnquiriesController::class, 'index'])->middleware('auth');
Route::get('/enquiries/create', [EnquiriesController::class, 'create'])->middleware('auth');
Route::get('/enquiries/{enquiries}', [EnquiriesController::class, 'show'])->middleware('auth');
Route::post('/enquiries', [EnquiriesController::class, 'store'])->middleware('auth');
Route::get('/enquiries/{enquiries}/edit', [EnquiriesController::class, 'edit'])->middleware('auth');
Route::put('/enquiries/{enquiries}', [EnquiriesController::class, 'update'])->middleware('auth');
Route::delete('/enquiries/{enquiries}', [EnquiriesController::class, 'destroy'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| System Users Routes
|--------------------------------------------------------------------------
*/
Route::get('/register', [UserController::class, 'create'])->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::get('/users/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/update', [UserController::class, 'update'])->middleware('auth');
Route::post('/users/avatar', [UserController::class, 'updateAvatar'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Clients Routes
|--------------------------------------------------------------------------
*/
Route::get('/clients', [ClientsController::class, 'index'])->middleware('auth');
Route::get('/clients/create', [ClientsController::class, 'create'])->middleware('auth');
Route::post('/clients', [ClientsController::class, 'store'])->middleware('auth');
Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->middleware('auth');
Route::put('/clients/{client}', [ClientsController::class, 'update'])->middleware('auth');
Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->middleware('auth');
Route::post('/clients/logo', [ClientsController::class, 'updateLogo'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Properties Routes
|--------------------------------------------------------------------------
*/
Route::get('/properties', [PropertiesController::class, 'index'])->middleware('auth');
Route::get('/properties/create', [PropertiesController::class, 'create'])->middleware('auth');
Route::post('/properties', [PropertiesController::class, 'store'])->middleware('auth');
Route::get('/properties/{property}/edit', [PropertiesController::class, 'edit'])->middleware('auth');
Route::put('/properties/{property}', [PropertiesController::class, 'update'])->middleware('auth');
Route::delete('/properties/{property}', [PropertiesController::class, 'destroy'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Units Routes
|--------------------------------------------------------------------------
*/
Route::get('/units', [UnitsController::class, 'index'])->middleware('auth');
Route::get('/units/create', [UnitsController::class, 'create'])->middleware('auth');
Route::post('/units', [UnitsController::class, 'store'])->middleware('auth');
Route::get('/units/{unit}', [UnitsController::class, 'show'])->middleware('auth');
Route::get('/units/{unit}/edit', [UnitsController::class, 'edit'])->middleware('auth');
Route::put('/units/{unit}', [UnitsController::class, 'update'])->middleware('auth');
Route::delete('/units/{unit}', [UnitsController::class, 'destroy'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Profiles Routes
|--------------------------------------------------------------------------
*/
Route::get('/profiles', [ProfilesController::class, 'index'])->middleware('auth');
Route::get('/profiles/create', [ProfilesController::class, 'create'])->middleware('auth');
Route::post('/profiles', [ProfilesController::class, 'store'])->middleware('auth');
Route::get('/profiles/{profile}', [ProfilesController::class, 'show'])->middleware('auth');
Route::get('/profiles/{profile}/edit', [ProfilesController::class, 'edit'])->middleware('auth');
Route::put('/profiles/{profile}', [ProfilesController::class, 'update'])->middleware('auth');
Route::delete('/profiles/{profile}', [ProfilesController::class, 'destroy'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Email Templates Routes
|--------------------------------------------------------------------------
*/
Route::get('/email-templates', [EmailTemplatesController::class, 'index'])->middleware('auth');
Route::get('/email-templates/create', [EmailTemplatesController::class, 'create'])->middleware('auth');
Route::post('/email-templates', [EmailTemplatesController::class, 'store'])->middleware('auth');
Route::get('/email-templates/{email_templates}/edit', [EmailTemplatesController::class, 'edit'])->middleware('auth');
Route::put('/email-templates/{email_templates}', [EmailTemplatesController::class, 'update'])->middleware('auth');
Route::get('/email-templates/{email_templates}', [EmailTemplatesController::class, 'show'])->middleware('auth');
Route::delete('/email-templates/{email_templates}', [EmailTemplatesController::class, 'destroy'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Applications Routes
|--------------------------------------------------------------------------
*/
Route::get('/applications', [ApplicationsController::class, 'index'])->middleware('auth');
Route::put('/applications/{application}', [ApplicationsController::class, 'update'])->middleware('auth');
Route::get('/applications/{application}', [ApplicationsController::class, 'show'])->middleware('auth');
Route::delete('/applications/{application}', [ApplicationsController::class, 'destroy'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Send Email Routes
|--------------------------------------------------------------------------
*/
/* Send Enquiry Email Template */
Route::get('/email-templates/{email_templates}/enquiry-reply/{enquiry}', [MailController::class, 'sendEnquiryEmail'])->middleware('auth');
