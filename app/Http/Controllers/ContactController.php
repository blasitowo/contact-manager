<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\Rules\Phone;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        if ($request->has('email')) {
            $request->merge(['email' => strtolower($request->email)]);
        }
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255|unique:contacts,email',
            'phone'   => ['nullable', new Phone],
            'address' => 'nullable|string',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.email' => 'Debes ingresar un email válido.',
            'email.unique' => 'Este email ya está registrado.',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')
                         ->with('success', 'Contacto creado exitosamente.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        if ($request->has('email')) {
            $request->merge(['email' => strtolower($request->email)]);
        }
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255|unique:contacts,email,' . $contact->id,
            'phone'   => ['nullable', new Phone],
            'address' => 'nullable|string',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
                         ->with('success', 'Contacto actualizado correctamente.');
    }

    public function search(Request $request)
    {
        $search = $request->get('q');

        $contacts = Contact::when($search, function ($query) use ($search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        if ($request->ajax()) {
            return view('contacts._table', compact('contacts'))->render();
        }

        return view('contacts.index', compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')
                         ->with('success', 'Contacto eliminado.');
    }
}
