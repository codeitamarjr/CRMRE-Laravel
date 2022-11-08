<?php

use App\Models\Listing;
use App\Models\Enquiries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\ClientsController;
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

// Show All enquiries
Route::get('/enquiries', [EnquiriesController::class, 'index'])->middleware('auth');
// Create Enquiry
Route::get('/enquiries/create', [EnquiriesController::class, 'create'])->middleware('auth');
// Store Enquiry Data
Route::post('/enquiries', [EnquiriesController::class, 'store'])->middleware('auth');
// Edit Enquiry
Route::get('/enquiries/{enquiries}/edit', [EnquiriesController::class, 'edit'])->middleware('auth');
// Update Enquiry
Route::put('/enquiries/{enquiries}', [EnquiriesController::class, 'update'])->middleware('auth');
// Delete Enquiry
Route::delete('/enquiries/{enquiries}', [EnquiriesController::class, 'destroy'])->middleware('auth');
// Show Single Enquiry
Route::get('/enquiries/{enquiries}', [EnquiriesController::class, 'show'])->middleware('auth');

// Create User Form
Route::get('/register', [UserController::class, 'create'])->middleware('auth');
// Store New User
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');
// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Edit User Profile
Route::get('/users/edit', [UserController::class, 'edit'])->middleware('auth');
// Update User Profile
Route::put('/users/update', [UserController::class, 'update'])->middleware('auth');
// Update User Avatar
Route::post('/users/avatar', [UserController::class, 'updateAvatar'])->middleware('auth');

// Show All Clients
Route::get('/clients', [ClientsController::class, 'index'])->middleware('auth');
// Create Client
Route::get('/clients/create', [ClientsController::class, 'create'])->middleware('auth');
// Store Client Data
Route::post('/clients', [ClientsController::class, 'store'])->middleware('auth');
// Edit Client
Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->middleware('auth');
// Update Client
Route::put('/clients/{client}', [ClientsController::class, 'update'])->middleware('auth');
// Delete Client
Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->middleware('auth');
// Update Client Logo
Route::post('/clients/logo', [ClientsController::class, 'updateLogo'])->middleware('auth');

// Show All Properties
Route::get('/properties', [PropertiesController::class, 'index'])->middleware('auth');
// Create Property
Route::get('/properties/create', [PropertiesController::class, 'create'])->middleware('auth');
// Store Property Data
Route::post('/properties', [PropertiesController::class, 'store'])->middleware('auth');
// Edit Property
Route::get('/properties/{property}/edit', [PropertiesController::class, 'edit'])->middleware('auth');
// Update Property
Route::put('/properties/{property}', [PropertiesController::class, 'update'])->middleware('auth');
// Delete Property
Route::delete('/properties/{property}', [PropertiesController::class, 'destroy'])->middleware('auth');

// Show All Units
Route::get('/units', [UnitsController::class, 'index'])->middleware('auth');
// Create Unit
Route::get('/units/create', [UnitsController::class, 'create'])->middleware('auth');
// Store Unit Data
Route::post('/units', [UnitsController::class, 'store'])->middleware('auth');
// Show Single Unit
Route::get('/units/{unit}', [UnitsController::class, 'show'])->middleware('auth');
// Edit Unit
Route::get('/units/{unit}/edit', [UnitsController::class, 'edit'])->middleware('auth');
// Update Unit
Route::put('/units/{unit}', [UnitsController::class, 'update'])->middleware('auth');
// Delete Unit
Route::delete('/units/{unit}', [UnitsController::class, 'destroy'])->middleware('auth');

// Show All Applications
Route::get('/applications', [ApplicationsController::class, 'index'])->middleware('auth');
// Create Application
Route::get('/applications/create', [ApplicationsController::class, 'create'])->middleware('auth');
// Store Application Data
Route::post('/applications', [ApplicationsController::class, 'store'])->middleware('auth');
// Show Single Application
Route::get('/applications/{application}', [ApplicationsController::class, 'show'])->middleware('auth');
// Edit Application
Route::get('/applications/{application}/edit', [ApplicationsController::class, 'edit'])->middleware('auth');
// Update Application
Route::put('/applications/{application}', [ApplicationsController::class, 'update'])->middleware('auth');
// Delete Application
Route::delete('/applications/{application}', [ApplicationsController::class, 'destroy'])->middleware('auth');

// Index Email Templates
Route::get('/email-templates', [EmailTemplatesController::class, 'index'])->middleware('auth');
// Create Email Template
Route::get('/email-templates/create', [EmailTemplatesController::class, 'create'])->middleware('auth');
// Store Email Template
Route::post('/email-templates', [EmailTemplatesController::class, 'store'])->middleware('auth');
// Edit Email Template
Route::get('/email-templates/{email_templates}/edit', [EmailTemplatesController::class, 'edit'])->middleware('auth');
// Update Email Template
Route::put('/email-templates/{email_templates}', [EmailTemplatesController::class, 'update'])->middleware('auth');
// Show Single Email Template
Route::get('/email-templates/{email_templates}', [EmailTemplatesController::class, 'show'])->middleware('auth');
// Delete Email Template
Route::delete('/email-templates/{email_templates}', [EmailTemplatesController::class, 'destroy'])->middleware('auth');