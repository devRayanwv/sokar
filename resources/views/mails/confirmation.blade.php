@component('mail::message')
# Hi {{ $user->name }}
## Welcom to Blood Sugar Monitor App

Your registeration is completed.
@component('mail::button', ['url' => route('confirmation', $user->token)])
Confirm your email.
@endcomponent

Thanks and feel free to share your feedback.

Kind Regards,<br>
Rayan Alamer<br>
{{ config('app.name') }}
@endcomponent
