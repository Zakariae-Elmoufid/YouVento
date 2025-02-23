@extends('layout.admin')

@section('content')
<div class="container">
    <h1>Événements</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Créer un nouvel événement</a>

    <div id="calendar"></div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de début</th>
                <th>Lieu</th>
                <th>Capacité</th>
                <th>Club</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->start_date->format('d/m/Y H:i') }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    @if($event->max_capacity)
                        {{ $event->current_participants }} / {{ $event->max_capacity }}
                    @else
                        Illimité
                    @endif
                </td>
                <td>{{ $event->club->name }}</td>
                <td>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: '{{ route('events.calendar') }}',
        eventClick: function(info) {
            // Ouvrir un modal avec les détails de l'événement
            showEventDetails(info.event);
        }
    });
    calendar.render();

    function showEventDetails(event) {
        alert('Événement: ' + event.title + '\n' +
              'Date: ' + event.start.toLocaleString() + '\n' +
              'Lieu: ' + event.extendedProps.location + '\n' +
              'Description: ' + event.extendedProps.description);
    }
});
</script>
@endpush