<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <aside class="p-4 sm:p-6 bg-white shadow sm:rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-indigo-200 to-blue-200 flex items-center justify-center text-indigo-700 font-bold text-xl">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>
                    <div>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->name }}</div>
                        <div class="text-sm text-gray-600">{{ $user->email }}</div>
                        <div class="text-xs text-gray-500 mt-1">Role: <span class="font-medium">{{ $user->role ?? 'user' }}</span></div>
                    </div>
                </div>
                <div class="mt-6 space-y-2">
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline text-sm">Dashboard</a>
                    <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline text-sm">View All Events</a>
                    @if($user->role === 'admin')
                        <div class="flex flex-col space-y-1 mt-3 pt-3 border-t border-gray-200">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Admin</span>
                            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline text-sm">Admin Dashboard</a>
                            <a href="{{ route('admin.my-events') }}" class="text-blue-600 hover:underline text-sm">My Events</a>
                            <a href="{{ route('admin.events.pending') }}" class="text-blue-600 hover:underline text-sm">Pending Approvals</a>
                            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline text-sm">Manage Users</a>
                        </div>
                    @else
                        <div class="flex flex-col space-y-1 mt-3 pt-3 border-t border-gray-200">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">User</span>
                            <a href="{{ route('user.dashboard') }}" class="text-blue-600 hover:underline text-sm">My Dashboard</a>
                            <a href="{{ route('user.my-events') }}" class="text-blue-600 hover:underline text-sm">My Events</a>
                            <a href="{{ route('events.create') }}" class="text-blue-600 hover:underline text-sm">Create Event</a>
                        </div>
                    @endif
                </div>
            </aside>

            <div class="lg:col-span-2 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
