@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">Edit User: {{ $user->name }}</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium" for="name">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $user->name) }}"
                class="w-full border border-gray-300 rounded px-3 py-2"
                required
            />
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium" for="email">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $user->email) }}"
                class="w-full border border-gray-300 rounded px-3 py-2"
                required
            />
            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-1 font-medium" for="role">Role</label>
            <select
                name="role"
                id="role"
                class="w-full border border-gray-300 rounded px-3 py-2"
                required
            >
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
            Update User
        </button>
    </form>
@endsection
