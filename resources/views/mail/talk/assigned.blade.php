@component('mail::message')
# Tiene una asignación

En la reunion del {{ $meeting->englishDayOfWeek..' '.$meeting->day' '.$meeting->englishMonth }} para el Grupo de habla Hispana de Woden

Se le ha solicitado realizar la siguiente asignación:
- **{{ $talk->title }}**

@if($talk->type == 'ministry')
> **Nota:** Si es necesario por favor encuentre a un ayudante para realizar la asignación.
@endif

> **Importante:** Si no puede realizar la asignación, por favor, contacte Hugo Ripoll o Abel Pastor.

Gracias,<br>
{{ config('app.name') }}
@endcomponent
