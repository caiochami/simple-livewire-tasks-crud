<?php

namespace Tests\Unit\Livewire;

use App\Http\Livewire\Task\Create;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTasks()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Create::class)
            ->set('title', 'foo')
            ->call('create');

        $this->assertTrue(Post::whereTitle('foo')->exists());
    }
}
