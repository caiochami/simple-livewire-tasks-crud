<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class Create extends Component
{
    protected $rules = ['title' => 'required'];

    public function create()
    {
        auth()->user()->tasks()->create(
            $this->validate()
        );

        return redirect()->to('/tasks');
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
