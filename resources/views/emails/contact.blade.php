<x-mail::message>
# Beste {{$name}},

Uw bericht is goed ontvangen.

## Bericht:
{{$message}}

Met vriendelijke groetjes,<br>
{{ config('app.name') }}
</x-mail::message>
