@component('mail::message')
# welcome
@component('mail::panel')
            Pour Activer Votre Compte.
@endcomponent


@component('mail::button', ['url' => $url])
Cliquer ici !
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent