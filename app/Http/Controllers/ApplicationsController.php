<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    // Show all Applications
    public function index()
    {
        return view('applications.index', [
            'applications' => Auth::user()->applications->sortByDesc('created_at'),
        ]);
    }

    // Show Single Application
    public function show(Applications $application)
    {
        return view('applications.show', [
            'application' => $application,
        ]);
    }

    // Delete Application
    public function destroy(Applications $application)
    {
        $application->delete();
        return redirect('/applications')->with('success', 'Application Deleted Successfully');
    }
}
