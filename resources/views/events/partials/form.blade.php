<div>
    <label for="title" class="block font-semibold mb-1">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" required
           class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
    @error('title')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="description" class="block font-semibold mb-1">Description</label>
    <textarea name="description" id="description" rows="4" required
              class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description', $event->description ?? '') }}</textarea>
    @error('description')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="date" class="block font-semibold mb-1">Date</label>
    <input type="date" name="date" id="date" value="{{ old('date', isset($event) ? $event->date->format('Y-m-d') : '') }}" required
           class="w-full border rounded px-3 py-2 @error('date') border-red-500 @enderror">
    @error('date')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="location" class="block font-semibold mb-1">Location</label>
    <input type="text" name="location" id="location" value="{{ old('location', $event->location ?? '') }}" required
           class="w-full border rounded px-3 py-2 @error('location') border-red-500 @enderror">
    @error('location')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="capacity" class="block font-semibold mb-1">Capacity</label>
    <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $event->capacity ?? '') }}" min="1" required
           class="w-full border rounded px-3 py-2 @error('capacity') border-red-500 @enderror">
    @error('capacity')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="image" class="block font-semibold mb-1">Event Image (optional)</label>
    <input type="file" name="image" id="image" accept="image/*"
           class="w-full border rounded px-3 py-2 @error('image') border-red-500 @enderror">
    @error('image')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    @if(isset($event) && $event->image)
        <img src="{{ asset('storage/' . $event->image) }}" alt="Current image" class="mt-2 w-48 rounded">
    @endif
</div>
