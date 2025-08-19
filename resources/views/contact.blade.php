@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Contact Us</h1>
        <p class="text-gray-700 mb-6">Have a question or feedback? Send us a message and we'll get back to you.</p>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-6">{{ session('success') }}</div>
        @endif

        <form action="#" method="POST" class="bg-white rounded-lg shadow p-6 grid gap-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Your Name</label>
                <input type="text" class="w-full border rounded px-3 py-2" required />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Your Email</label>
                <input type="email" class="w-full border rounded px-3 py-2" required />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Message</label>
                <textarea rows="5" class="w-full border rounded px-3 py-2" required></textarea>
            </div>
            <div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Send Message</button>
            </div>
        </form>
    </div>
@endsection


