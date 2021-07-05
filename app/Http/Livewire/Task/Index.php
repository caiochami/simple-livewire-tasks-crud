<?php

namespace App\Http\Livewire\Task;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * Modal state
     *
     * @var bool
     */
    public $isModalActive;

    protected $listeners = [
        'taskDestroyed' => '$refresh',
        'taskUpdated' => '$refresh'
    ];

    public function mount()
    {
        $this->isModalActive = false;
    }

    public function create(): void
    {
        $this->isModalActive = true;
    }

    public function render()
    {
        return view('livewire.task.index', [
            'tasks' => Task::query()
                ->whereHas(
                    'user',
                    function (Builder $builder) {
                        $builder->whereId(auth()->id());
                    }
                )
                ->orderBy('completed', 'ASC')
                ->orderBy('updated_at', 'DESC')
                ->paginate(15)
        ]);
    }
}
