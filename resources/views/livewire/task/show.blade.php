<div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
    <div class="flex flex-col space-y-3 text-xs sm:text-sm md:text-base">
        <div class="flex flex-row justify-between space-x-1 sm:space-x-0">
            <span>Task: {{ $task->id }}</span>
            <div>
                <x-jet-button type="button" wire:click="$toggle('contentIsVisible')">
                {{ __($contentIsVisible ? 'Hide' : 'Show') }}
            </x-jet-button>
            </div>
        </div>
        @if ($contentIsVisible)
            <div class="flex flex-row justify-between">
                <ul>
                    <li>Author: {{ $task->user->name }}</li>
                </ul>
                <ul>
                    <li>Created at: {{ $task->created_at->format('Y/m/d H:i:s') }}</li>
                    <li>Last modified: {{ $task->updated_at->format('Y/m/d H:i:s') }}</li>
                </ul>        
            </div>

            <div class="border"></div>
        @endif
        
      
        <span>
            Description: {{ $task->title }}
        </span>

        <div class="flex flex-col justify-center align-center space-y-1 sm:space-y-0 sm:flex-row sm:justify-between">
           <div>
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
           </div>
           
           <div>
            <x-jet-danger-button 
            type="button" 
            wire:loading.delay.attr="disabled"
            class="disabled:opacity-50"
            wire:click="destroy({{ $task->id }})">
                {{ __('Trash') }}
            </x-jet-danger-button>
           </div>
        </div>
    </div>
</div>