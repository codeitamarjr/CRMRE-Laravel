<?php

use App\Http\Controllers\ClientsController;
use App\Models\Listing;
use App\Models\Enquiries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnquiriesController;

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

// Show Register / Create User Form
Route::get('/register', [UserController::class, 'create'])->middleware('auth');
// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');
// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Show User Profile
Route::get('/users/edit', [UserController::class, 'edit'])->middleware('auth');
// Update User Profile
Route::put('/users/update', [UserController::class, 'update'])->middleware('auth');
// Update User Avatar
Route::post('/users/avatar', [UserController::class, 'updateAvatar'])->middleware('auth');