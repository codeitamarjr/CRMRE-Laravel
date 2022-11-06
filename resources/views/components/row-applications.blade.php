@props(['application'])

<tr>
    <td></td>
    <td>{{ $application->property_name }}</td>
    <td>{{ $application->name }} {{ $application->surname }}</td>
    <td>{{ $application->email }}</td>
    <td>{{ $application->employment_sector }}</td>
    <td>{{ $application->employment_position }}</td>
    <td>€ {{ number_format($application->income, 2, ',', '.') }}</td>
    <td>{{ $application->status }}</td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/applications/{{$application->id}}">
                @csrf
                @method('DELETE')
                <a href="/applications/{{ $application->id }}" class="btn btn-primary btn-sm"><i class="fas fa-eye fa-sm fa-fw me-2 text-gray-400"></i>View</a>
                <a class="btn btn-secondary btn-sm" href="applications/{{$application->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>