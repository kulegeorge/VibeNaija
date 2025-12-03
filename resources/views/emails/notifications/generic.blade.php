@component('mail::message')

{{-- HEADER SECTION --}}
<div style="text-align: center; padding: 20px 0;">
    <img src="{{ asset('/Frontend/images/header.jpg') }}" alt="Vibe Nigeria Logo" width="90" style="margin-bottom: 10px;">
    <h1 style="font-size: 24px; font-weight: 700; margin: 0;">
        {{ $title }}
    </h1>
</div>

{{-- BODY TEXT --}}
<div style="
    background: #ffffff;
    border-radius: 8px;
    padding: 20px;
    margin-top: 10px;
    font-size: 16px;
    color: #444;
    line-height: 1.7;
">
    {!! nl2br(e($message)) !!}
</div>

{{-- CALL TO ACTION --}}
@if($url)
<div style="text-align: center; margin: 25px 0;">
    @component('mail::button', ['url' => $url, 'color' => 'primary'])
    View Details
    @endcomponent
</div>
@endif

{{-- FOOTER --}}
<div style="border-top: 1px solid #eee; margin-top: 30px; padding-top: 15px; color: #888; font-size: 13px; text-align: center;">
    You are receiving this notification because you are a registered user of <strong>Vibe Nigeria Platform</strong>.
    <br><br>
    If you believe this message was sent to you in error, you may ignore it.
</div>

@endcomponent
