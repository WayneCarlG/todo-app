@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-950 py-12">
        <div class="max-w-2xl mx-auto px-6">
            
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-10">
                
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Create New Task</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Add a new task to your list</p>
                </div>

                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Task Title
                            </label>
                            <input type="text" 
                                   name="title" 
                                   value="{{ old('title') }}"
                                   class="w-full px-5 py-4 bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-2xl focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-600 text-lg"
                                   placeholder="e.g. Buy groceries" 
                                   required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Description <span class="text-gray-400">(optional)</span>
                            </label>
                            <textarea name="description" 
                                      rows="5"
                                      class="w-full px-5 py-4 bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-2xl focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-600 resize-y"
                                      placeholder="Add more details...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-10">
                        <button type="submit"
                                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-4 rounded-2xl transition-all">
                            Create Task
                        </button>
                        
                        <a href="{{ route('todos.index') }}" 
                           class="flex-1 text-center py-4 font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-2xl transition-all">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection