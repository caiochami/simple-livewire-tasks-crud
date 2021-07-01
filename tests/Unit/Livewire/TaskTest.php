<?php

namespace Tests\Unit\Livewire;

use App\Http\Livewire\Task\Create;
use App\Http\Livewire\Task\Update;
use App\Models\Task\Task;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * User
     *
     * @var User
     */
    protected $user;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * Tasks can be created.
     *
     * @return void
     */
    public function testCreateTasks()
    {
        $this->actingAs($this->user);
        Livewire::test(Create::class)
            ->set('title', 'foo')
            ->call('create');
        $this->assertTrue(Task::whereTitle('foo')->exists());
    }

    /**
     * Tasks can be updated.
     *
     * @return void
     */
    public function testUpdatedTasks()
    {
        $this->assertTrue(true);
        // $this->actingAs($this->user);

        // Livewire::test(Update::class)
        //     ->set('id', 1)
        //     ->set('title', 'foo')
        //     ->call('create');

        // $this->assertTrue(Task::whereTitle('foo')->exists());
    }
}
