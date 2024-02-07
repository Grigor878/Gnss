<?php

namespace App\Services;

class FilterService
{
    public function __construct()
    {
        //
    }

    public function opportunityFilter($query, $data)
    {
        if ( auth()->user()->role_id != 1 ) {
            $query = $query->where('user_id', auth()->user()->id);
        }

        if (isset($data['status']) && $data['status'] !== null) {
            $query = $query->where('opportunity_statuses_id', $data['status']);
        }

        return $query;
    }
}
