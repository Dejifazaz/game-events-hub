@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">Manage Users</h1>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
        <tr class="bg-indigo-600 text-white">
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Role</th>
            <th class="py-3 px-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $user->name }}</td>
                <td class="py-2 px-4">{{ $user->email }}</td>
                <td class="py-2 px-4">{{ $user->role ?? 'user' }}</td>
                <td class="py-2 px-4 text-center">
                    <a href="{{ route('admin.users.edit', $user) }}"
                       class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
@endsection
