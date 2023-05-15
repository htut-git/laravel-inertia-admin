<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Team::create(['name' => 'Admin', 'user_id' => 1, 'personal_team' => true]);
        Team::create(['name' => 'Member', 'user_id' => 1, 'personal_team' => true]);
        Team::create(['name' => 'User', 'user_id' => 1, 'personal_team' => true]);
    }
}
