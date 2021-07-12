<div>
    <x-jet-dialog-modal wire:model="isModalActive">
        <x-slot name="title">
           Create Task
        </x-slot>
    
        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model="title" name="title" required autofocus autocomplete="name" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isModalActive')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                Save
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-button wire:click="create">Create Task</x-jet-button>
</div>
