<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    // Show All Applications
    public function index()
    {
        return view('applications.index', [
            'applications' => Applications::latest()
            ->join('properties', 'applications.property_code', '=', 'properties.property_code')
            ->where('applications.prs_code','=', Auth::user()->prs_code)
            ->select('applications.*', 'properties.name as property_name')
            ->limit(1000)
            ->orderBy('applications.created_at', 'desc')
            ->filter(request(['search']))->get()
        ]);
    }
}
