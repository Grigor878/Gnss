<?php

namespace App\Repositories;

use App\Models\Opportunity;
use Illuminate\Support\Facades\DB;

class OpportunityRepository
{

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        DB::beginTransaction();
        try {
            $opportunity = Opportunity::create($data);
            DB::commit();
            return [
                'status' => 200,
                'message' => "Opportunity created successfully",
                'data' => $opportunity,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'status' => 400,
                'message' => "Something went wrong",
                'data' => $e->getMessage(),
            ];
        }
    }

    /**
     * updateStatus
     *
     * @param  string $opportunityId
     * @param  string $statusId
     * @return void
     */
    public function updateStatus(string $opportunityId, string $statusId)
    {

        DB::beginTransaction();
        try {
            $opportunity = Opportunity::find($opportunityId)->update([
                'status_id' => $statusId
            ]);

            DB::commit();
            return [
                'status' => 200,
                'message' => "Opportunity updeted successfully",
                'data' => $opportunity,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'status' => 400,
                'message' => "Something went wrong",
                'data' => $e->getMessage(),
            ];
        }

    }

}
