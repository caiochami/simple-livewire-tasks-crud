<?php

namespace Database\Seeders;

use App\Models\Task\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory()->count(1000)->create();
    }
}
