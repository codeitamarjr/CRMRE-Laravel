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

    // Update Application
    public function update(Request $request, Applications $application)
    {

        $data = $request->validate([
            'status' => 'string|max:255',
            'property_code' => 'string|max:255',
            'unit_code' => 'string|max:255',
        ]);

        // Clean unit_code when property_code is updated
        if (!empty($data['property_code'])) {
            if ($data['property_code'] != $application['property_code']) {
                $application->unit_code = null;
                $application->save();
            }
        }


        $application->update($data);
        return back()->with('message', 'Application Updated Successfully');
    }
    // Delete Application
    public function destroy(Applications $application)
    {
        $application->delete();
        return redirect('/applications')->with('success', 'Application Deleted Successfully');
    }
}
