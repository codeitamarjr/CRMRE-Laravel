@props(['unit'])

<tr>
    <td></td>
    <td>{{ $unit->property_name }}</td>
    <td>{{ $unit->name }}</td>
    <td>{{ $unit->number }}</td>
    <td>{{ $unit->type }}</td>
    <td>{{ $unit->block }}</td>
    <td>{{ $unit->floor }}</td>
    <td>{{ $unit->bedrooms }}</td>
    <td>{{ $unit->date_available }}</td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/units/{{$unit->id}}">
                @csrf
                @method('DELETE')
                <a href="/units/{{ $unit->id }}" class="btn btn-primary btn-sm"><i class="fas fa-eye fa-sm fa-fw me-2 text-gray-400"></i>View</a>
                <a class="btn btn-secondary btn-sm" href="units/{{$unit->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>