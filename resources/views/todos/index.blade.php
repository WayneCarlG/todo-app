@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Your todo content here -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold">My Tasks</h1>
                <a href="{{ route('todos.create') }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl flex items-center gap-2">
                    <i class="fas fa-plus"></i> New Task
                </a>
            </div>

            @if (session('success'))
                <div class="bg-emerald-100 dark:bg-emerald-900/50 border border-emerald-300 dark:border-emerald-700 text-emerald-700 dark:text-emerald-300 px-6 py-4 rounded-2xl mb-8">
                    {{ session('success') }}
                </div>
            @endif

            @if ($todos->isEmpty())
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-16 text-center">
                    <i class="fas fa-clipboard-list text-6xl text-gray-300 dark:text-gray-600 mb-6"></i>
                    <h3 class="text-2xl font-semibold text-gray-500 dark:text-gray-400">No tasks yet</h3>
                    <p class="text-gray-400 mt-3">Create your first task to get started</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($todos as $todo)
                        <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all group">
                            <div class="flex items-start gap-5">
                                <!-- Checkbox -->
                                <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="mt-1 w-8 h-8 rounded-2xl border-2 flex items-center justify-center transition-all
                                            {{ $todo->completed 
                                                ? 'bg-emerald-500 border-emerald-500' 
                                                : 'border-gray-300 dark:border-gray-600 group-hover:border-indigo-400' }}">
                                        @if ($todo->completed)
                                            <i class="fas fa-check text-white text-lg"></i>
                                        @endif
                                    </button>
                                </form>

                                <!-- Content -->
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-gray-900 dark:text-white break-words
                                        {{ $todo->completed ? 'line-through text-gray-400 dark:text-gray-500' : '' }}">
                                        {{ $todo->title }}
                                    </p>
                                    @if ($todo->description)
                                        <p class="text-gray-600 dark:text-gray-400 mt-2 text-[15px]">
                                            {{ $todo->description }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center gap-1 opacity-60 group-hover:opacity-100 transition-all">
                                    <a href="{{ route('todos.edit', $todo) }}" 
                                       class="p-3 text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-gray-700 rounded-2xl">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('todos.destroy', $todo) }}" method="POST"
                                          onsubmit="return confirm('Delete this task?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-3 text-gray-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-gray-700 rounded-2xl">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection