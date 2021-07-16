<?php

namespace App\Http\Livewire\Task;

use App\Models\Task\Task;
use Livewire\Component;

class Show extends Component
{
    /**
     * Shows additional information.
     *
     * @var boolean
     */
    public $contentIsVisible = false;

    /**
     * Task model.
     *
     * @var Task
     */
    public $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Destroy a task resource.
     *
     * @param Task $task Task instance
     *
     * @return void
     */
    public function destroy(Task $task): void
    {
        $task->delete();
        $this->emitUp('taskDestroyed');
    }

    /**
     * Toogle a task status.
     *
     * @return void
     */
    public function toggleStatus(Task $task): void
    {
        $task->toggleStatus();
        $task->save();
        $this->emitUp('taskUpdated');
    }

    public function render()
    {
        return view('livewire.task.show', ['task' => $this->task]);
    }
}
