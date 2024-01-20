@component('mail::message')
# Reset Password

Click on the link below to reset your password. This link is only valid for the next 30 minutes.

@component('mail::button', ['url' => $resetLink])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
