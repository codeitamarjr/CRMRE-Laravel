@php
    $emailSetting = App\Models\EmailSetting::all()->where('prs_code', '=', auth()->user()->prs_code);
@endphp
{{-- HTML Select listing all clients --}}
    <select class="form-select" name="email_code">
        @foreach ($emailSetting as $email)
            <option value="{{ $email->email_code }}">{{ $email->service_provider }}</option>
         @endforeach
    </select>