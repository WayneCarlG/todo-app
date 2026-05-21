@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Edit Todo</h1>

        <form action="{{ route('todos.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title', $todo->title) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500"
                       required>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500">{{ old('description', $todo->description) }}</textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-medium">
                    Update Todo
                </button>
                <a href="{{ route('todos.index') }}" 
                   class="px-8 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
