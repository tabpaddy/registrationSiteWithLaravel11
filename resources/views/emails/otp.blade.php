<x-mail::message>
# Welcome {{$data['email']}}

You requested for an OTP code, here is yours {{$data['otp']}}.

if you didnt request for it kindly decline.


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
