<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Member;
use App\Models\Activity;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(5)
            ->has(Group::factory()
                ->count(2)
                ->has(Member::factory()->count(3))
                ->has(Activity::factory()->count(4))
            )
            ->create();
    }
}
