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
            ['name' => 'Marketing qualifications'],
            ['name' => 'Recognition of need'],
            ['name' => 'Evaluations/presentation'],
            ['name' => 'Final negotiations'],
            ['name' => 'Close']
        ];

        foreach ($roles as $role) {
            OpportunityStatuses::create($role);
        }
    }
}
