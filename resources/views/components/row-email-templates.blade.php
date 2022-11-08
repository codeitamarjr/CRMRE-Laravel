@props(['email_template'])

<tr class="table-row">
    <td>{{ $email_template->created_at }}</td>
    <td>{{ $email_template->property_code ? $email_template->property->name : 'General' }}</td>
    <td>{{ $email_template->name }}</td>
    <td>{{ $email_template->subject }}</td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/email-templates/{{ $email_template->id }}">
                @csrf
                @method('DELETE')
                <a href="/email-templates/{{ $email_template->id }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-eye fa-sm fa-fw me-2 text-gray-400"></i></a>
                <a class="btn btn-secondary btn-sm" href="email-templates/{{ $email_template->id }}/edit"><i
                        class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>
