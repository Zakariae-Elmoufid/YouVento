@extends('layout.admin')

@section('content')
<div class="container">
    <h1>{{ isset($event) ? 'Modifier' : 'Créer' }} un événement</h1>

    <form action="{{ isset($event) ? route('events.update', $event) : route('events.store') }}" method="POST">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                   id="title" name="title" 
                   value="{{ old('title', isset($event) ? $event->title : '') }}" 
                   required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" 
                      rows="3">{{ old('description', isset($event) ? $event->description : '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Date de début</label>
                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" 
                       id="start_date" name="start_date" 
                       value="{{ old('start_date', isset($event) ? $event->start_date->format('Y-m-d\TH:i') : '') }}" 
                       required>
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="end_date">Date de fin</label>
                <input type="datetime-local" class="form-control @error('end_date' ) is-invalid @enderror" 
                       id="end_date" name="end_date" 
                       value="{{ old('end_date', isset($event) ? $event->end_date->format('Y-m-d\TH:i') : '') }}" 
                       required>
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                   id="location" name="location" 
                   value="{{ old('location', isset($event) ? $event->location : '') }}" 
                   required>
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="max_capacity">Capacité maximale</label>
            <input type="number" class="form-control @error('max_capacity') is-invalid @enderror" 
                   id="max_capacity" name="max_capacity" 
                   value="{{ old('max_capacity', isset($event) ? $event->max_capacity : '') }}" 
                   min="0">
            @error('max_capacity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Laissez vide pour une capacité illimitée</small>
        </div>

        <div class="form-group">
            <label for="club_id">Club</label>
            <select class="form-control @error('club_id') is-invalid @enderror" 
                    id="club_id" name="club_id" 
                    required>
                <option value="">Sélectionnez un club</option>
                @foreach($clubs as $club)
                    <option value="{{ $club->id }}"
                        {{ (old('club_id', isset($event) ? $event->club_id : '') == $club->id) ? 'selected' : '' }}>
                        {{ $club->name }}
                    </option>
                @endforeach
            </select>
            @error('club_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($event) ? 'Mettre à jour' : 'Créer' }} l'événement
        </button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Validation en temps réel optionnelle
    const form = document.querySelector('form');
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');

    function validateDates() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (startDate >= endDate) {
            endDateInput.setCustomValidity('La date de fin doit être après la date de début');
        } else {
            endDateInput.setCustomValidity('');
        }
    }

    startDateInput.addEventListener('change', validateDates);
    endDateInput.addEventListener('change', validateDates);
});
</script>
@endpush