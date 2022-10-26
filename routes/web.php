<?php

use App\Models\Listing;
use App\Models\Enquiries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\PropertiesController;

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
// Edit Property
Route::get('/properties/{property}/edit', [PropertiesController::class, 'edit'])->middleware('auth');
// Update Property
Route::put('/properties/{property}', [PropertiesController::class, 'update'])->middleware('auth');
// Delete Property
Route::delete('/properties/{property}', [PropertiesController::class, 'destroy'])->middleware('auth');