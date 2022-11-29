@props(['application'])
@php
    use App\Models\Properties;
    use App\Models\Profiles;
@endphp

<tr>
    <td></td>
    <td>{{ Properties::where('property_code', $application->property_code)->first() == null ? 'N/A' : Properties::where('property_code', $application->property_code)->first()->name }}
    </td>
    <td>{{ $application->unit_code }}</td>
    </td>
    <td>{{ Profiles::where('application_id', $application->application_id)->first() == null ? '' : Profiles::where('application_id', $application->application_id)->first()->name . ' ' . Profiles::where('application_id', $application->application_id)->first()->surname }}
    </td>
    <td>{{ Profiles::where('application_id', $application->application_id)->first() == null ? '' : Profiles::where('application_id', $application->application_id)->first()->email }}
    </td>
    <td>{{ Profiles::where('application_id', $application->application_id)->first() == null ? '' : Profiles::where('application_id', $application->application_id)->first()->employment_sector }}
    </td>
    <td>X%
    </td>
    <td>{{ $application->status }}</td>
    <td>
        <div class="btn-group">
            <form method="POST" action="/applications/{{ $application->id }}">
                @csrf
                @method('DELETE')
                <a href="/applications/{{ $application->id }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-eye fa-sm fa-fw me-2 text-gray-400"></i>View</a>
                <a class="btn btn-secondary btn-sm" href="applications/{{ $application->id }}/edit"><i
                        class="fa-solid fa-pencil"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </td>
</tr>
