<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('ToDo') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="todo-container">
            <div class="todo-input">
                <input type="text" wire:model="todo" placeholder="Enter task" />
                <x-primary-button wire:click="addTodo">Add</x-primary-button>
            </div>
            <div class="todo-list mt-4">
                @foreach ($todoevent as $item)
                    <div class="todo-item flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow mb-2">
                        <span class="text-gray-800">{{ $item }}</span>
                        <button class="text-red-500 hover:text-red-700" wire:click="deleteTodo('{{ $item }}')">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1H7a1 1 0 00-1 1v1h8V5a1 1 0 00-1-1h-1V3a1 1 0 00-1-1zm3 4H7v8a2 2 0 002 2h4a2 2 0 002-2V6z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
