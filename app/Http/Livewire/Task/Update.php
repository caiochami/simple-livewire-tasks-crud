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
    public function update(int $id)
    {
        $validated = collect($this->validate());
        Task::findOrFail($id)->update(
            $validated->merge(['user_id' => \auth()->id()])->all()
        );
    }

    public function render()
    {
        return view('livewire.task.update');
    }
}
