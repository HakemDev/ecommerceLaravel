@component('mail::message')
  # Bonjour  
@component('mail::panel')
    vous avez commander $namepr son prix total est $total
@endcomponent




Thanks,<br>
{{ config('app.name') }}
@endcomponent