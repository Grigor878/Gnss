<?php

namespace App\Repositories;

use App\Models\OpportunityNotes;
use Illuminate\Support\Facades\DB;

class OpportunityNotesRepository
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
            $opportunityNote = OpportunityNotes::create($data);
            DB::commit();
            return $opportunityNote;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete(string $id)
    {
        DB::beginTransaction();

        try {
            $opportunityNote = OpportunityNotes::find($id)->delete();
            DB::commit();
            return [
                'status' => 200,
                'message' => "Opportunity note deleted successfully",
                'data' => $opportunityNote,
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
