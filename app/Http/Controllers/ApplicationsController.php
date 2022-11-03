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
                ->where('applications.prs_code', '=', Auth::user()->prs_code)
                ->select('applications.*', 'properties.name as property_name')
                ->limit(1000)
                ->orderBy('applications.created_at', 'desc')
                ->filter(request(['search']))->get()
        ]);
    }

    // Show Application
    public function show(Applications $application)
    {
        return view('applications.show', compact('application'));
    }

    // Create Application
    public function create()
    {
        return view('applications.create');
    }

    // Store Application
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alternative_email' => 'nullable|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'county' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:255',
            'employment_status' => 'required|string|max:255',
            'employment_sector' => 'required|string|max:255',
            'employment_position' => 'nullable|string|max:255',
            'employment_company' => 'nullable|string|max:255',
            'employment_phone' => 'nullable|string|max:255',
            'employment_start_date' => 'nullable|date',
            'income' => 'required|numeric',
            'extra_income' => 'nullable|numeric',
            'extra_income_source' => 'nullable|string|max:255',
            'landlord_name' => 'nullable|string|max:255',
            'landlord_phone' => 'nullable|string|max:255',
            'preferred_move_out_date' => 'nullable|date',
            'car' => 'nullable|string|max:255',
            'pet' => 'nullable|string|max:255',
            'pet_breed' => 'nullable|string|max:255',
            'children' => 'nullable|string|max:255',
            'children_age' => 'nullable|string|max:255',
            'HAP' => 'nullable|string|max:255',
            'HAP_allowance' => 'nullable|numeric',
            'notes' => 'nullable|string|max:255',
            'waiting_list' => 'required|string|max:5',

        ]);
        $data['application_id'] = 'AP' . uniqid();
        (isset($data['prs_code'])) ? '' : $data['prs_code'] = auth()->user()->prs_code;
        (isset($data['property_code'])) ? '' : $data['property_code'] = 'MANUALINPUT';
        (isset($data['type'])) ? '' : $data['type'] = 'Main';
        $data['status'] = 'New';
        try {
            $application = Applications::create($data);
            return redirect('applications.show', $application);
        } catch (\Exception $e) {
            return redirect('/applications')->with('error', 'Error Creating Application(This Email Address Already Exists)
            Use the seach bar and transfer this application to the selected property' . $e->getMessage());
        }
    }
}
