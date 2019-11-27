@component('mail::message')
# Um novo evento!

Olá, {{ Auth::user()->name }}, um(a) novo(a) {{ $evento->tipo }} foi cadastrado(a).

@component('mail::panel')
### {{ $evento->titulo }} <div class="text-muted">{{ $evento->inicio }}</div>

{{ $evento->descricao }}
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
