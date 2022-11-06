@php
    $clients = App\Models\Clients::all()->where('prs_code', '=', auth()->user()->prs_code);
@endphp
{{-- HTML Select listing all clients --}}
    <select class="form-select" name="client_code">
        @foreach ($clients as $client)
            <option value="{{ $client->client_code }}">{{ $client->name }}</option>
         @endforeach
    </select>


