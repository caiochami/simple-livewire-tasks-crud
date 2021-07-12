<?php

namespace App\Http\Livewire\Task;

use App\Models\Task\Task;
use Livewire\Component;

class Create extends Component
{
    /**
     * Modal state
     *
     * @var bool
     */
    public $isModalActive;

    /**
     * Title property
     *
     * @var string
     */
    public $title;


    protected function rules()
    {
        return Task::rules();
    }

    public function mount()
    {
        $this->isModalActive = false;
    }

    public function create(): void
    {
        $this->isModalActive = true;
    }

    /**
     * Create Task resource.
     *
     * @return void
     */
    public function save(): void
    {
        $validated = collect($this->validate());
        $task = Task::create(
            $validated->merge(['user_id' => \auth()->id()])->all()
        );
        $this->isModalActive = false;
        $this->emitUp('task-created', $task);
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
