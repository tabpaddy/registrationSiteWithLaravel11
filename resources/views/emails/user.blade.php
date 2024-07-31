<x-mail::message>
# {{$data['username']}} , You are welcome to My Page

You can now login with the button below.

<x-mail::button :url="route('login')">
Login here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
