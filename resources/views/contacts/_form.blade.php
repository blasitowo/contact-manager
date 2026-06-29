<div class="mb-3">
    <label for="name" class="form-label">Nombre *</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name ?? '') }}" required>
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contact->email ?? '') }}">
    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Teléfono</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $contact->phone ?? '') }}">
    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Dirección</label>
    <textarea name="address" id="address" class="form-control">{{ old('address', $contact->address ?? '') }}</textarea>
    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
</div>
