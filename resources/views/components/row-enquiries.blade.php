@props(['enquiry'])
@php
    use App\Models\Properties;
@endphp


<tr class="table-row">
    <td>
        <img class="rounded-circle me-2" width="25" height="25"
            src="https://hermes.daft.ie/dsch-daft-frontend/0.1.1916/static/favicons/apple-icon-57x57.png">
    </td>
    <td>
        {{ Properties::where('property_code', $enquiry->property_code)->first()->name }}
    <td>{{ $enquiry->contact_name }}</td>
    <td>{{ $enquiry->contact_email }}</td>
    <td>
        {{ $enquiry->title }}
    </td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/enquiries/{{ $enquiry->id }}">
                @csrf
                @method('DELETE')
                <a href="/enquiries/{{ $enquiry->id }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-eye fa-sm fa-fw me-2 text-gray-400"></i>View</a>
                <a class="btn btn-secondary btn-sm" href="enquiries/{{ $enquiry->id }}/edit"><i
                        class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
    <td>{{ date('d-m-Y', strtotime($enquiry->date)) }}</td>
    <td>{{ $enquiry->status }}</td>
</tr>
