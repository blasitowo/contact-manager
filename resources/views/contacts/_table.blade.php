<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este contacto?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">No se encontraron contactos.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $contacts->links() }}
