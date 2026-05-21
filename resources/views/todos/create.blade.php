@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Create New Todo</h1>

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500"
                       placeholder="Buy groceries" required>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-medium mb-2">Description (optional)</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500"
                          placeholder="Write any extra details..."></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium">
                    Create Todo
                </button>
                <a href="{{ route('todos.index') }}" 
                   class="px-8 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
