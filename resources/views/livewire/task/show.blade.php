<div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
    <div class="flex flex-col space-y-3">
        <div class="flex flex-row justify-between">
            <ul>
                <li>Id: {{ $task->id }}</li>
                <li>Author: {{ $task->user->name }}</li>
            </ul>
            <ul>
                <li>Created at: {{ $task->created_at->format('Y/m/d H:i:s') }}</li>
                <li>Last modified: {{ $task->updated_at->format('Y/m/d H:i:s') }}</li>
            </ul>        
        </div>
        <div class="border"></div>
        <span>
            {{ $task->title }}
        </span>

        <div class="flex justify-between">
            @if ($task->completed)
            <x-success-button wire:click="toggleStatus({{ $task }})" 
            type="button">
                {{ $task->status }}
            </x-success-button>
            @else
            <x-warning-button wire:click="toggleStatus({{ $task }})" 
            type="button">
                {{ $task->status }}
            </x-warning-button>
            @endif
           
            <x-jet-danger-button 
            type="button" 
            wire:click="destroy({{ $task->id }})">
                {{ __('Trash') }}
            </x-jet-danger-button>
        </div>
    </div>
</div>