@extends('layouts.app')

@section('content')
    <h1>{{ $contact->name }}</h1>
    <hr>
    <p><strong>Email:</strong> {{ $contact->email ?: 'No especificado' }}</p>
    <p><strong>Teléfono:</strong> {{ $contact->phone ?: 'No especificado' }}</p>
    <p><strong>Dirección:</strong> {{ $contact->address ?: 'No especificada' }}</p>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Volver al listado</a>
@endsection
