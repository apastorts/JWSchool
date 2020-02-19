<h2>
    Reunion de la semana del {{ ucfirst(carbon($meeting->date)->locale('es')->dayName)
    .' '.carbon($meeting->date)->locale('es')->day
    .' de '.ucfirst(carbon($meeting->date)->locale('es')->monthName)
    .' del '.carbon($meeting->date)->locale('es')->year }}
</h2>
<table style="width:100%; margin-top: 1.2em; margin-bottom: 1.2em;">
        <tr>
            <td style="padding-top: 1em;">Oración de apertura</td>
            <td colspan="2" style="padding-top: 1em; text-align: right;">{{ $meeting->openPray ? $meeting->openPray->name : 'Sin Asignar' }}</td>
        </tr>
        <tr>
            <td style="padding-top: 1em;">Presidencia</td>
            <td colspan="2" style="padding-top: 1em; text-align: right;">{{ $ministry->first()->user ? $ministry->first()->user->name : 'Sin Asignar' }}</td>
        </tr>
</table>
<table style="width:100%; margin-top: 1.2em; margin-bottom: 1.2em;">
    <tr >
        <th colspan="2" style="width:100%; background-color: #5A6A70; color: white; text-align: center; font-size: 1.5em;">TESOROS DE LA BIBLIA</th>
    </tr>
    @foreach($treasures as $treasure)
        <tr>
            <td style="padding-top: 1em;">{{ $treasure->title }}</td>
            <td colspan="2" style="padding-top: 1em; text-align: right;">{{ $treasure->user ? $treasure->user->name : 'Sin Asignar' }}</td>
        </tr>
    @endforeach
</table>
<table style="width:100%; margin-top: 1.2em; margin-bottom: 1.2em;">
    <tr>
        <th colspan="2" style="width:100%; background-color: #C18626; color: white; text-align: center; font-size: 1.5em;">SEAMOS MEJORES MAESTROS</th>
    </tr>
    @foreach($ministry as $talk)
        <tr>
            <td style="padding-top: 1em">{{ $talk->title }}</td>
            <td colspan="2" style="text-align: right; padding-top: 1em">
                {{ $talk->user ? $talk->user->name : 'Sin Asignar' }}
                @if($talk->partner)
                     / {{$talk->partner->name }}
                @endif
            </td>
        </tr>
    @endforeach
</table>
<table style="width:100%; margin-top: 1.2em; margin-bottom: 1.2em;">
    <tr>
        <th colspan="2" style="width:100%; background-color: #961525; color: white; text-align: center; font-size: 1.5em;">NUESTRA VIDA CRISTIANA</th>
    </tr>
    @foreach($christianLiving as $talk)
        <tr>
            <td style="padding-top: 1em">{{ $talk->title }}</td>
            <td colspan="2" style="text-align: right; padding-top: 1em">{{ $talk->user ? $talk->user->name : 'Sin Asignar' }}</td>
        </tr>
    @endforeach
</table>
<table style="width:100%; margin-top: 1.2em; margin-bottom: 1.2em;">
    <tr>
        <td style="padding-top: 1em;">Oración de conclusión</td>
        <td colspan="2" style="padding-top: 1em; text-align: right;">{{ $meeting->closePray ? $meeting->closePray->name : 'Sin Asignar' }}</td>
    </tr>
</table>
