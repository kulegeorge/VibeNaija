@component('mail::message')
# {{ $subject }}

{!! nl2br(e($body)) !!}

@if(!empty($unsubscribeUrl))
@component('mail::subcopy')
If you no longer wish to receive these emails,  
[Unsubscribe]({{ $unsubscribeUrl }})
@endcomponent
@endif

Thanks,  
**{{ config('app.name') }}**
@endcomponent
