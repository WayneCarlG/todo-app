@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">My Todos</h1>
            <a href="{{ route('todos.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg flex items-center gap-2">
                <i class="fas fa-plus"></i> New Todo
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($todos->isEmpty())
            <p class="text-gray-500 text-center py-10">No todos yet. Create one above!</p>
        @else
            <div class="space-y-3">
                @foreach ($todos as $todo)
                    <div class="flex items-center justify-between bg-gray-50 hover:bg-gray-100 p-4 rounded-xl border">
                        <div class="flex items-center gap-4">
                            <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                        class="w-7 h-7 rounded-full border-2 flex items-center justify-center
                                        {{ $todo->completed ? 'bg-green-500 border-green-500' : 'border-gray-300' }}">
                                    @if ($todo->completed)
                                        <i class="fas fa-check text-white text-sm"></i>
                                    @endif
                                </button>
                            </form>

                            <div>
                                <p class="{{ $todo->completed ? 'line-through text-gray-400' : 'text-gray-800 font-medium' }}">
                                    {{ $todo->title }}
                                </p>
                                @if ($todo->description)
                                    <p class="text-sm text-gray-500 mt-1">{{ $todo->description }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('todos.edit', $todo) }}" 
                               class="text-blue-600 hover:text-blue-800 px-3 py-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" 
                                  onsubmit="return confirm('Delete this todo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 px-3 py-1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
