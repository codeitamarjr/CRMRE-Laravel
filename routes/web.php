<?php

use App\Models\Listing;
use App\Models\Enquiries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

// All enquiries
Route::get('/enquiries', [EnquiriesController::class, 'index']);
// Create Enquiry
Route::get('/enquiries/create', [EnquiriesController::class, 'create']);
// Store Enquiry Data
Route::post('/enquiries', [EnquiriesController::class, 'store']);
// Edit Enquiry
Route::get('/enquiries/{enquiries}/edit', [EnquiriesController::class, 'edit']);
// Edit Enquiry Update
Route::put('/enquiries/{enquiries}', [EnquiriesController::class, 'update']);
// Delete Enquiry
Route::delete('/enquiries/{enquiries}', [EnquiriesController::class, 'destroy']);
// Single Enquiry
Route::get('/enquiries/{enquiries}', [EnquiriesController::class, 'show']);

// Show Register / Create User Form
Route::get('/register', [UserController::class, 'create']);


// All Listings
Route::get('/listings', function () {
    return view('listings',[
        'heading' => 'Listings',
        'listings' => Listing::all()
    ]);
});

// Single listing
Route::get('/listings/{id}', function ($id) {
    return view('listing',[
        'listing' => Listing::find($id)
    ]);
});


