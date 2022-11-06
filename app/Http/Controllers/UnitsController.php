<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    // Show all units
    public function index()
    {
        return view('units.index', [
            'units' => Units::all(),
        ]);
    }

    // Show single unit
    public function show(Units $unit)
    {
        return view('units.show', [
            'unit' => $unit,
        ]);
    }

    // Show create unit form
    public function create()
    {
        return view('units.create');
    }

    // Store new unit
    public function store(Request $request)
    {
        $data = $request->validate([
            'property_code' => 'required',
            'custom_code' => 'sometimes',
            'type' => 'required',
            'block' => 'required',
            'floor' => 'required',
            'number' => 'required',
            'bedrooms' => 'required',
            'car_spaces' => 'required',
            'date_available' => 'required',
            'status' => 'required',
        ]);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $data['unit_code'] = 'UNIT' .  uniqid() ;

        Units::create($data);
        return redirect('/units')->with('message', 'Unit Created Successfully');
    }

    // Show edit unit form
    public function edit(Units $unit)
    {
        return view('units.edit', [
            'unit' => $unit,
        ]);
    }

    // Update unit
    public function update(Request $request, Units $unit)
    {
        $data = $request->validate([
            'custom_code' => 'sometimes',
            'type' => 'required',
            'block' => 'required',
            'floor' => 'required',
            'number' => 'required',
            'bedrooms' => 'required',
            'car_spaces' => 'required',
            'date_available' => 'required',
            'status' => 'required',
        ]);
        $data['updated_at'] = now();

        $unit->update($data);
        return redirect('/units')->with('message', 'Unit Updated Successfully');
    }

    // Delete unit
    public function destroy(Units $unit)
    {
        $unit->delete();
        return redirect('/units')->with('message', 'Unit Deleted Successfully');
    }
}
