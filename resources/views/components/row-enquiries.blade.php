@props(['enquiry'])

<tr class="table-row">
    <td>
        <img class="rounded-circle me-2" width="25" height="25" src="https://hermes.daft.ie/dsch-daft-frontend/0.1.1916/static/favicons/apple-icon-57x57.png">
    </td>
    <td onclick="window.open('enquiries/{{$enquiry->id}}','_blank')">{{ $enquiry->property_name }}</td>
    <td onclick="window.open('enquiries/{{$enquiry->id}}','_blank')">{{ $enquiry->contact_name }}</td>
    <td onclick="window.open('enquiries/{{$enquiry->id}}','_blank')">{{ $enquiry->contact_email }}</td>
    <td  onclick="window.open('enquiries/{{$enquiry->id}}','_blank')">
        {{ $enquiry->title }}
    </td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/enquiries/{{$enquiry->id}}">
                @csrf
                @method('DELETE')
                <a class="btn btn-secondary btn-sm" href="enquiries/{{$enquiry->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
    <td>{{ date('d-m-Y', strtotime($enquiry->date)) }}</td>
    <td>{{ $enquiry->status }}</td>
</tr>