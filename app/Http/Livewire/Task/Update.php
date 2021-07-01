<?php

namespace App\Http\Livewire\Task;

use App\Models\Task\Task;
use Livewire\Component;

class Update extends Component
{
    protected function rules()
    {
        return Task::rules();
    }

    /**
     * Id property
     *
     * @var bool
     */
    public $id;

    /**
     * Completed property
     *
     * @var bool
     */
    public $completed;

    /**
     * Title property
     *
     * @var string
     */
    public $title;

    /**
     * Update Task resource.
     *
     * @return void
     */
    public function update()
    {
        $validated = collect($this->validate());
        Task::findOrFail()->update(
            $validated->merge(['user_id' => \auth()->id()])->all()
        );
    }

    public function render()
    {
        return view('livewire.task.update');
    }
}
