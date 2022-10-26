@props(['property'])

<tr class="table-row">
    <td>    
        <img class="rounded-circle me-2" width="25" height="25" src="{{ ($property->logo == null) ? '/assets/img/briefcase-solid.svg' : 'asset($property->logo)' }}">
    </td>
    <td>
        {{ $property->client_name }}
    </td>
    </td>
    <td>{{ $property->name }}</td>
    <td>00</td>
    <td>{{ $property->type }}</td>
    <td>{{ $property->status }}</td>
    <td>{{ $property->address }}</td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/properties/{{ $property->id }}">
                @csrf
                @method('DELETE')
                <a class="btn btn-secondary btn-sm" href="{{ $property->website }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                <a class="btn btn-secondary btn-sm" href="properties/{{$property->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>
