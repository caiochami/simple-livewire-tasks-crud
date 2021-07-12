<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class='flex flex-col space-y-3'>

        <div class="px-4 py-5 bg-white sm:p-6 sm:rounded-md flex flex-col md:flex-row md:justify-between">
            <livewire:task.create />
        </div>

        @forelse ($tasks as $task)
            <livewire:task.show :key="$task->id" :task="$task"/>
        @empty

        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md text-center">
            No tasks found. 
        </div>

        @endforelse
              
    </div>

    <br>

    {{ $tasks->links() }}  
    
</div>
