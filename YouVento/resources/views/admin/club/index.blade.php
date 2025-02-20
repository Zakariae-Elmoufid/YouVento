@extends('layout.admin')

@section('content')
<h2>Liste des Clubs</h2>
<a href="{{ route('club.create') }}" class="btn btn-primary">Ajouter un Club</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    @foreach($clubs as $club)
        <tr>
            <td>{{ $club->name }}</td>
            <td>{{ $club->description }}</td>
            <td>
                <a href="{{ route('club.edit', $club->id) }}">Modifier</a>
               
            </td>
        </tr>
    @endforeach
</table>
@endsection
