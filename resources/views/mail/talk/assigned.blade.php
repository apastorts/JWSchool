@component('mail::message')
# Tiene una asignación

En la reunion del {{ $meeting->englishDayOfWeek.' '.$meeting->day.' '.$meeting->englishMonth }} para el Grupo de habla Hispana de Woden

Se le ha solicitado realizar la siguiente asignación:

@if($recipient->id == $talk->user->id)
- **{{ $talk->title }}**
  @if($talk->partner && $talk->type == 'ministry')
- Su acompañante es **{{ $talk->partner->name }}**.
  @endif
  @if($talk->partner && $talk->type != 'ministry')
- Su lector es **{{ $talk->partner->name }}**.
  @endif
@endif

@if($talk->partner && $recipient->id == $talk->partner->id && $talk->type == 'ministry')
- Acompañante de **{{ $talk->user->name }}** en la asignación **{{ $talk->title }}**
@endif

@if($talk->partner && $recipient->id == $talk->partner->id && $talk->type != 'ministry')
- Lector en la asignación **{{ $talk->title }}** con **{{ $talk->user->name }}**
@endif

> **Importante:** Si no puede realizar la asignación, por favor, contacte Hugo Ripoll o Abel Pastor.

Gracias,<br>
{{ config('app.name') }}
@endcomponent
