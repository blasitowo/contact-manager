@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista de Contactos</h1>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">+ Nuevo Contacto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Barra de búsqueda --}}
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Buscar contactos por nombre o email...">
    </div>

    {{-- Contenedor donde se actualizará la tabla --}}
    <div id="tableContainer">
        @include('contacts._table', ['contacts' => $contacts])
    </div>
@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('searchInput');
    const tableContainer = document.getElementById('tableContainer');
    let timeoutId = null;

    searchInput.addEventListener('input', function() {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            const query = this.value;
            fetch(`{{ route('contacts.search') }}?q=${encodeURIComponent(query)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                tableContainer.innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
        }, 300);
    });
</script>
@endpush
