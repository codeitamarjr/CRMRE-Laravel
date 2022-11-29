@props(['property_code'])
@php
    use App\Models\Units;
    $units = Units::all()
        ->where('property_code', $property_code)
        ->sortBy('number');
@endphp

<select class="form-select" name="unit_code" id="unit_code">
    @foreach ($units as $unit)
        <option value="{{ $unit->unit_code }}">{{ $unit->number }}({{ $unit->unit_code }} - Available
            {{ $unit->date_available }})</option>
    @endforeach
</select>
