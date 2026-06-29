@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </head>
    <h1>Nuevo Contacto</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        @include('contacts._form')

        <script>
            const input = document.querySelector("#phone");
            const iti = window.intlTelInput(input, {
                initialCountry: "py",
                preferredCountries: ['es', 'mx', 'ar', 'co'],
                separateDialCode: true,
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });
        </script>
        <button type="submit" class="btn btn-success">Guardar Contacto</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
