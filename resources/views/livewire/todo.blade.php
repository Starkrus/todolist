<div>
    <div class="flex justify-center">
        <x-input-error :messages="$errors->get('todo')" class="mt-2"/>
    </div>

    <form class="flex" method="POST" wire:submit.prevent='addTodo'>
        <x-text-input wire:model='todo' class="w-full mr-2"/>

        <x-primary-button>
            Запомнить
        </x-primary-button>
    </form>
    <br>
    @forelse($todos as $todo)
        {{-- First todo --}}
        <div class="flex mt-5 py-2 justify-center justify-between">
            <div>
                <input id="green-checkbox" type="checkbox"
                       class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            </div>
            <div>
                @if($edit == $todo->id)
                    <x-text-input wire:model='editedTodo' class="w-full mr-2"/>
                @else
                    {{ $todo->todo }}
                @endif
            </div>

            <div>
            @if ($edit == $todo->id)
                <x-secondary-button wire:click='updateTodo({{ $todo->id }})'>
                    Сохранить
                </x-secondary-button>
                <x-danger-button wire:click='cancelEdit'>
                    Отменить
                </x-danger-button>
            @else
                <x-secondary-button wire:click='editTodo({{ $todo->id }})'>
                    Редактировать
                </x-secondary-button>
                <x-danger-button>
                    Удалить
                </x-danger-button>
                @endif
            </div>

        </div>

    @empty
    @endforelse

    <div class="mt-5">
        {{ $todos->links() }}
        <div>

        </div>
