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
        $testable = Livewire::test(Create::class)
            ->set('title', null);

        $testable->call('create')
            ->assertHasErrors(['title']);

        $testable->set('title', 'foo')->call('create');
        $this->assertTrue(Task::whereTitle('foo')->exists());
    }

    /**
     * Tasks can be created.
     *
     * @return void
     */
    public function testUpdateTasks()
    {
        $this->actingAs($this->user);
        $testable = Livewire::test(Update::class)
            ->set('title', null);

        $testable->call('create')
            ->assertHasErrors(['title']);

        $testable->set('title', 'foo')->call('create');
        $this->assertTrue(Task::whereTitle('foo')->exists());
    }
}
