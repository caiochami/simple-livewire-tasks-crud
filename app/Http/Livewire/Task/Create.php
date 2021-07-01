<?php

namespace App\Http\Livewire\Task;

use App\Models\Task\Task;
use Livewire\Component;

class Create extends Component
{
    protected function rules()
    {
        return Task::rules();
    }

    /**
     * Title property
     *
     * @var string
     */
    public $title;

    /**
     * Create Task resource.
     *
     * @return void
     */
    public function create()
    {
        $validated = collect($this->validate());
        Task::create(
            $validated->merge(['user_id' => \auth()->id()])->all()
        );
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
