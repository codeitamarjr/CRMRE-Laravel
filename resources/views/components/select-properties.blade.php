@php
    $properties = App\Models\Properties::all();

    // Join the Clients(client_code) with Properties(client_code) table where the prs_code is the same as the user's prs_code and show Properties Name
    $properties = DB::table('properties')
        ->join('clients', 'clients.client_code', '=', 'properties.client_code')
        ->where('clients.prs_code', '=', auth()->user()->prs_code)
        ->select('properties.name','properties.client_code' ,'properties.property_code')
        ->get();

@endphp
{{-- HTML Select listing all properties --}}
    <select class="form-select" name="property_code">
        @foreach ($properties as $property)
            <option value="{{ $property->property_code }}">{{ $property->name }}</option>
         @endforeach
    </select>
