<?php

namespace App\Http\Controllers;

use App\Models\Enquiries;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnquiriesController extends Controller
{
    // Show all enquiries
    public function index(){
        return view('enquiries.index',[
            'heading' => 'Enquiries',
            'enquiries' => Enquiries::latest()->filter
            (request(['search']))->get()
        ]);
    }

    // Show a single enquiry
    public function show(enquiries $enquiries){
        return view('enquiries.show',[
            'heading' => 'Enquiry',
            'enquiry' => $enquiries
        ]);
    }

    // Create Enquiry Form
    public function create(){
        return view('enquiries.create',[
            'heading' => 'Create Manual Enquiry'
        ]);
    }

    // Store Enquiry Data
    public function store(Request $request){
        $data = $request->validate([
            'property_code' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required|numeric|min:5',
            'body' => 'required',
        ]);

        $data['prs_code'] = auth()->user()->prs_code;
        $data['enquiry_id'] = 'ENQ' .  uniqid() ;
        $data['email_code'] = 'MANUALINPUT';
        if(empty($data['title'])){
            $data['title'] = 'Manual Enquiry';
        }
        $data['status'] = 'New';
        Enquiries::create($data);
        return redirect('/enquiries')->with('message', 'Enquiry Created Successfully');
    }

    // Show Edit Enquiry Form
    public function edit(Enquiries $enquiries){
        return view('enquiries.edit',[
            'heading' => 'Edit Enquiry',
            'enquiry' => $enquiries
        ]);
    }

        // Update Enquiry Data
        public function update(Request $request, Enquiries $enquiries){
            $data = $request->validate([
                'property_code' => 'required',
                'contact_name' => 'required',
                'contact_email' => 'required',
                'contact_phone' => 'required|min:5',
                'body' => 'required',
            ]);
            $enquiries->update($data);
            return back()->with('message', 'Enquiry Updated Successfully');
        }

    // Delete Enquiry
    public function destroy(Enquiries $enquiries){
        $enquiries->delete();
        return redirect('/enquiries')->with('message', 'Enquiry Deleted Successfully');
    }
}
