<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunityStatuses extends Model
{
    use HasFactory;

    /**
     * Get all of the opportunity for the opportunityStatuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunity(): HasMany
    {
        return $this->hasMany(Opportunity::class);
    }
}
