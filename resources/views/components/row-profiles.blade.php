@props(['profile'])

<tr>
    <td></td>
    <td>{{ $profile->name }} {{ $profile->surname }}</td>
    <td>{{ $profile->email }}</td>
    <td>{{ $profile->employment_sector }}</td>
    <td>{{ $profile->employment_position }}</td>
    <td>€ {{ number_format($profile->income, 2, ',', '.') }}</td>
    <td>{{ $profile->status }}</td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/profiles/{{ $profile->id }}">
                @csrf
                @method('DELETE')
                <a href="/profiles/{{ $profile->id }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-eye fa-sm fa-fw me-2 text-gray-400"></i>View</a>
                <a class="btn btn-secondary btn-sm" href="profiles/{{ $profile->id }}/edit"><i
                        class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>
