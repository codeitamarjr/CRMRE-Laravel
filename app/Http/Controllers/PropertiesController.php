<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    // Show All Properties
    public function index(){
        $properties = Properties::all();
        return view('properties.index', [
            'heading' => 'Properties',
            'properties' => $properties
        ]);
    }

    // Create Property Form
    public function create(){
        return view('properties.create', [
            'heading' => 'Create Property'
        ]);
    }

    // Store Property Data
    public function store(Request $request){
        $data = $request->validate([
            'client_code' => 'required',
            'type' => 'required',
            'status' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'website' => 'required',
            'description' => 'required',
            'email_code' => 'required',
        ]);
        $data['property_code'] = 'PROP' .  uniqid() ;

        Properties::create($data);
        return redirect('/properties')->with('message', 'Property Created Successfully');
    }

    // Edit Property
    public function edit(Properties $property){
        return view('properties.edit', [
            'heading' => 'Edit Property',
            'property' => $property
        ]);
    }

    // Update Property
    public function update(Request $request, Properties $property){
        $data = $request->validate([
            'type' => 'required',
            'status' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'website' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $property->update($data);
        return redirect('/properties')->with('message', 'Property Updated Successfully');
    }

    // Delete Property
    public function destroy(Properties $property){
        $property->delete();
        return redirect('/properties')->with('message', 'Property Deleted Successfully');
    }
}
