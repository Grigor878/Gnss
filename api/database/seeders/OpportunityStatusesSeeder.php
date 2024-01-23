<?php

namespace Database\Seeders;

use App\Models\OpportunityStatuses;
use Illuminate\Database\Seeder;

class OpportunityStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Marketing qualifications', 'level' => 'primary'],
            ['name' => 'Recognition of need', 'level' => 'primary'],
            ['name' => 'Evaluations/presentation', 'level' => 'primary'],
            ['name' => 'Final negotiations', 'level' => 'primary'],
            ['name' => 'Close', 'level' => 'primary'],
            ['name' => 'Won', 'level' => 'secondary'],
            ['name' => 'Lost', 'level' => 'secondary'],
            ['name' => 'Terminated', 'level' => 'secondary']
        ];

        foreach ($roles as $role) {
            OpportunityStatuses::create($role);
        }
    }
}
