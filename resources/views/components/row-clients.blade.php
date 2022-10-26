@props(['client'])

<tr class="table-row">
    <td>
        <img class="rounded-circle me-2" width="25" height="25" src="{{ ($client['logo'] == null) ? '/assets/img/briefcase-solid.svg' : 'asset($client[\'logo\'])' }}">
    </td>
    <td>{{ $client['name'] }}</td>
    <td>{{ $client['phone'] }}</td>
    <td>{{ $client['email'] }}</td>
    <td>
        
    <td>
        <div class="btn-group">
            <form method="POST" action="/clients/{{$client->id}}">
                @csrf
                @method('DELETE')
                <a class="btn btn-secondary btn-sm" href="{{ $client['website'] }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                <a class="btn btn-secondary btn-sm" href="clients/{{$client->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>